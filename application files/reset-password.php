<?php

if (isset($_POST["reset-password"])) {
  
    $selector = $_POST["selector"];
    $validator = $_POST["validator"];
    $password = $_POST["password"];
    $passwordRepeat = $_POST["con_password"];
  
  
            if (empty($password) || empty($passwordRepeat)) {
                                
                header("Location: empty_password.php");
                exit();
            } else if ($password != $passwordRepeat) {
                header("Location: dif_password.php");
                exit();
            }

    $currentDate = date("U");

    require 'config.php';

    $sql = "SELECT * FROM pwdReset WHERE pwdResetSelector=? AND pwdResetExpires >= $currentDate";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an error!1";
        exit();
    } else{
       mysqli_stmt_bind_param($stmt,"s",$selector);
        mysqli_stmt_execute($stmt);
        //$currentDate = date("U"); //watch for this 1:09
        $result = mysqli_stmt_get_result($stmt);
        if(!$row = mysqli_fetch_assoc($result)) {
            echo "You need to re-submit your reset request.1";
            exit();
        } else { 
            $tokenBin = hex2bin($validator);
            $tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);

            if ($tokenCheck === false) {
                echo "You need to re-submit your reset request.2";
                exit();
            } elseif ($tokenCheck === true) {
                $tokenEmail = $row['pwdResetEmail'];

                $sql = "SELECT * FROM users WHERE email_address=?;";
                $stmt = mysqli_stmt_init($conn);
                
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo "There was an error!2";
                    exit();
                } else{
                    mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    if(!$row = mysqli_fetch_assoc($result)) {
                        echo "There was an error!3";
                        exit();                                                     
                    } else {

                        $sql = "UPDATE users SET user_pass=? WHERE email_address=?";
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            echo "There was an error!4";
                            exit();
                        } else{
                            $newPwdHash = password_hash($password, PASSWORD_DEFAULT);
                            mysqli_stmt_bind_param($stmt, "ss", $newPwdHash, $tokenEmail);
                            mysqli_stmt_execute($stmt);

                            $sql = "DELETE FROM pwdReset Where pwdResetEmail=?";
                            $stmt = mysqli_stmt_init($conn);
                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                                echo "There was an error!5";
                                exit();
                            } else {
                                mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                                mysqli_stmt_execute($smt);
                                header("Location: Login.php?newpwd=passwordupdated");
                            }

                            
                        }

                    }
            }
        }
    }
    }
} else{

    header("Location: reset_password.php");

       }

?>