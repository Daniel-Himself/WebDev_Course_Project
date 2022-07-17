<?php
require_once 'db.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


class User
{

    private string $usersEmail;
    private string $usersUid;
    private string $usersPwd;
    private string $usersPwdRepeat;
    private string $vkey;


    function users(string $usersEmail, string $usersUid, string $usersPwd, string $usersPwdRepeat, String $vkey)
    {
        $this->userEmail = strtolower($usersEmail);
        $this->userUid = $usersUid;
        $this->userPwd = $usersPwd;
        $this->userPwdRepeat = $usersPwdRepeat;
        $this->vkey = $vkey;
    }

    public function getEmail(): string
    {
        return $this->userEmail;
    }
    public function getUid(): string
    {
        return $this->userUid;
    }

    public function getPwd(): string
    {
        return $this->userPwd;
    }

    public function getPwdRepeat(): string
    {
        return $this->userPwdRepeat;
    }
    public function getvKey(): string
    {
        return $this->vkey;
    }

    public function setEmail($email)
    {
        $this->userEmail = $email;
    }

    public function setUid($uid)
    {
        $this->userUid = $uid;
    }

    public function setPwd($usersPwd)
    {
        $this->userPwd = $usersPwd;
    }

    public function setPwdRepeat($pwdRepeat)
    {
        $this->userPwdRepeat = $pwdRepeat;
    }
    public function setvKey($vkey)
    {
        $this->vkey = $vkey;
    }

    public function CheckEmail(User $user)
    {
        $db = new dbClass();
        $db::connect();
        $sql = "SELECT * FROM users WHERE email=:userEmail LIMIT 1";
        $statement = $db::$connection->prepare($sql);
        // Executing The Query
        $statement->execute(
            [
                ":userEmail" => $user->getEmail(),
            ]
        );
        if ($statement->fetch() > 0)
            return true;
        return false;
    }

    public function CreateUser(User $user)
    {
        $db = new dbClass();
        $db::connect();
        $sql = "INSERT INTO users (email, username, password, vkey) VALUES (:email,:username,:pwd,:vkey)";
        $statement = $db::$connection->prepare($sql);
        // Executing The Query
        $result =  $statement->execute(
            [
                ":email" => $user->getEmail(),
                ":username" => $user->getUid(),
                ":pwd" => $user->getPwd(),
                ":vkey" => $user->getvKey(),

            ]
        );
        $db::disconnect();
        // If The Executed Query Return True We Return True
        if ($result)
            return true;
        // If The Executed Query Return True We Return False
        return false;
    }

    public function AcountLogin(User $user,  int $rememberME): string
    {
        $db = new dbClass();
        $db::connect();
        //getPwd We Get The PASSWORD That We Write In The Input With The ( User Class ).
        $pwd = $user->getPwd();
        $userEmail = $user->getEmail();
        // SQL Query That We Send To Our SQL DATABASE That Select The PASSWORD To That UserName  We Write In The Input.
        $sql_2 = "SELECT * FROM users WHERE  email='$userEmail' LIMIT 1";
        $statement_2 = $db::$connection->query($sql_2);
        $result = $statement_2->fetch();
        $username = $result['username'];
        $emailADDRESS = $user->getEmail();
        if ($result > 0) {
            // After fetching the Sql DB For The PASSWORD We identify it as a new variable(" $_password ").
            $_password = $result["password"];
            // We Check The 2 PASSWORD The Password That We wrote it And The Password In The DataBase If They Are Equal.
            $db::disconnect();
            if ($pwd == $_password && $result["verified"] == "1" &&  $rememberME == '1') {
                //! If Yes He Will Success To Login And Starting A SESSION So We Can Use It To Change The Website Structure If He Logged In.
                session_start();
                $_SESSION["User"] = $username;
                setcookie("user_email", $emailADDRESS, time() + 60 * 60 * 24 * 7);
                setcookie("remember_me", "true", time() + 60 * 60 * 24 * 7);
                return "User Success";

            } elseif ($pwd == $_password && $result["verified"] == "1" &&  $rememberME == '0') {
                session_start();
                $_SESSION["User"] = $username;
                setcookie("remember_me", "false", time() + 60 * 60 * 24 * 7);
                return "User Success";
            } elseif ($pwd != $_password) {
                // If passwords do not match, the verification fails.
                return "User invalid password";
            } elseif ($result["verified"] == "0") {
                return "User is Deactiveated";
            }
        }
        return "Email Was Not Found";
    }

// This complete function has no use since we disabled email verification
//    public function SendAnEmailForVerifaction($email)
//    {
//        require 'vendor/phpmailer/phpmailer/src/Exception.php';
//        require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
//        require 'vendor/phpmailer/phpmailer/src/SMTP.php';
//        require "vendor/autoload.php";
//        $db = new dbClass();
//        $db::connect();
//        $sql = "select * FROM users WHERE email = '$email' ";
//        $statement = $db::$connection->query($sql);
//        $statement->fetch();
//        $count = $statement->rowCount();
//        if ($count > 0) {
//                $mail = new PHPMailer();
//                $mail->IsSMTP();
//                $mail->Host = "smtp.mailtrap.io"; // Enter your host here
//                $mail->STMPSecure = "tsl";
//                $mail->SMTPDebug  = 1;
//                $mail->SMTPAuth = true;
//                $mail->Username = "015e96ca2db36b"; // Enter your email here
//                $mail->Password = "267e8114620148"; //Enter your passwrod here
//                $mail->Port = '2525';
//                $mail->IsHTML(true);
//                $mail->From = "noReply@gmail.com";
//                $mail->Subject = "Verify your account";
//                $mail->Body = "Hi <br><br>
//                        Please click the link below to verify your account:
//                         <a href='http://localhost/WebDev_HW1/Reset_password_include.php?vkey=$token'>Verify Account</a>
//                        ";
//                $mail->setFrom("from@example.com", "Mailer");
//                $mail->AddAddress("$email", "Information");
//                if ($mail->Send())
//                    return true;
//                return false;
//
//        }
//    }
//    public function SendRequestForPasswordReset($email)
//    {
//        require 'vendor/phpmailer/phpmailer/src/Exception.php';
//        require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
//        require 'vendor/phpmailer/phpmailer/src/SMTP.php';
//        require "vendor/autoload.php";
//        $db = new dbClass();
//        $db::connect();
//        $sql = "select * FROM users WHERE email = '$email' ";
//        $statement = $db::$connection->query($sql);
//        $statement->fetch();
//        $count = $statement->rowCount();
//        if ($count > 0) {
//            $token = "sdfadihawsuidoui12312345`12";
//            $token = str_shuffle($token);
//            $token = substr($token, 0, 10);
//            // interval 10 means: that the token for reseting the password will be vailed for only 10 minutes
//            $sql = "UPDATE users SET vkey = '$token', token_expire = DATE_ADD(NOW() , INTERVAL 10 MINUTE) WHERE email ='$email'";
//            $result = $db::$connection->query($sql);
//            if ($result) {
//                $mail = new PHPMailer();
//                $mail->IsSMTP();
//                $mail->Host = "smtp.mailtrap.io"; // Enter your host here
//                $mail->STMPSecure = "tsl";
//                $mail->SMTPDebug  = 1;
//                $mail->SMTPAuth = true;
//                $mail->Username = "015e96ca2db36b"; // Enter your email here
//                $mail->Password = "267e8114620148"; //Enter your passwrod here
//                $mail->Port = '2525';
//                $mail->IsHTML(true);
//                $mail->From = "noReply@gmail.com";
//                $mail->Subject = "Verify your account";
//                $mail->Body = "Hi <br><br>
//                        Please click the link below to verify your account:
//                         <a href='http://localhost/WebDev_HW1/Reset_password_include.php?email=$email&vkey=$token'>Verify Account</a>
//                        ";
//                $mail->setFrom("from@example.com", "Mailer");
//                $mail->AddAddress("$email", "Information");
//                if ($mail->Send())
//                    return true;
//                return false;
//            }
//        }
//    }
    public function SendRequestForPasswordReset(): void
    {
       //ecoh'<a href="whatever.php" target="_blank">Opens On Another Tab</a>'
    }
    public function checkToken($token)
    {
        $db = new dbClass();
        $db::connect();
        $sql = "select vkey FROM users WHERE vkey = '$token' AND ";
        $statement = $db::$connection->query($sql);
        $statement->fetch();
    }

   // this function will give the user a new password and update it the our database
	// and will set the token to empty becuase he already pressed on the link
	public function resetPasswordViaEmail($email, $token, $password)
	{
		$db = new dbClass();
		$db::connect();
		$sql = "SELECT * FROM users WHERE email = '$email' AND vkey = '$token' AND token_expire > CURRENT_TIMESTAMP ";
		$statement = $db::$connection->query($sql);
		$count = $statement->rowCount();
		if ($count > 0) {
			$sql = "UPDATE users SET vkey = '',password = '$password' WHERE email='$email'";
			$statement = $db::$connection->query($sql);
			if ($statement)
				return true;
			return false;
		}
		return false;
		$db::disconnect();
	}
}