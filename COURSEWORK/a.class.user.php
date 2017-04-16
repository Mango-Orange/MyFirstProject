<?php



require_once 'dbConnect.php';



class USER

{



    private $conn;



    public function __construct()

    {

        $database = new Database();

        $db = $database->dbConnection();

        $this->conn = $db;

    }



    public function runQuery($sql)

    {

        $stmt = $this->conn->prepare($sql);

        return $stmt;

    }



    public function lasdID()

    {

        $stmt = $this->conn->lastInsertId();

        return $stmt;

    }



    public function register($uname,$email,$upass,$code)

    {

        try

        {

            $password = md5($upass);

            $stmt = $this->conn->prepare("INSERT INTO tbl_users(userName,userEmail,userPass,tokenCode) 

			                                             VALUES(:user_name, :user_mail, :user_pass, :active_code)");

            $stmt->bindparam(":user_name",$uname);

            $stmt->bindparam(":user_mail",$email);

            $stmt->bindparam(":user_pass",$password);

            $stmt->bindparam(":active_code",$code);

            $stmt->execute();

            return $stmt;

        }

        catch(PDOException $ex)

        {

            echo $ex->getMessage();

        }

    }



    public function login($email,$upass)

    {

        try

        {

            $stmt = $this->conn->prepare("SELECT * FROM tbl_users WHERE userEmail=:email_id");

            $stmt->execute(array(":email_id"=>$email));

            $userRow=$stmt->fetch(PDO::FETCH_ASSOC);



            if($stmt->rowCount() == 1)

            {

                if($userRow['userStatus']=="Y")

                {

                    if($userRow['userPass']==md5($upass))

                    {

                        if($userRow['adminLevel']=="Y"){

                            header("Location: a.index2.php");

                            exit;

                        }

                        elseif($userRow['block']=="Y"){

                            header("Location: a.index.php?error");

                            exit;

                        }

                        $_SESSION['userSession'] = $userRow['userID'];

                        return true;

                    }

                    else

                    {

                        header("Location: a.index.php?error");

                        exit;

                    }

                }

                else

                {

                    header("Location: a.index.php?inactive");

                    exit;

                }

            }

            else

            {

                header("Location: a.index.php?error");

                exit;

            }

        }

        catch(PDOException $ex)

        {

            echo $ex->getMessage();

        }

    }





    public function is_logged_in()

    {

        if(isset($_SESSION['userSession']))

        {

            return true;

        }

    }



    public function redirect($url)

    {

        header("Location: $url");

    }



    public function logout()

    {

        session_destroy();

        $_SESSION['userSession'] = false;

    }

    

}
/**
 * Created by PhpStorm.
 * User: 1615396
 * Date: 16/04/2017
 * Time: 15:31
 */