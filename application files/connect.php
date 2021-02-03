<?php

include('config.php');
if($conn->connect_errno > 0)
{
		die("Unable to connection to database[".$conn->connect_error."]");
}
        if (isset($_POST['btn-submit'])) {


					$uerr = $eerr = $perr = $cperr = $fnerr = $gerr = " ";
					$firstname = $lastname = $username = $student_number = $email_address = $password = " ";
					$boolean = false;

					function validate_inputs($data){

							$data = trim($data);
							$data = stripslashes($data);
							$data = htmlspecialchars($data);
							return $data;

					}
					$length = $_POST["password"];
					function strlength($str){
						$length = strlength($str);

							if($length > 15){

								return "Password should be less than 15 characters";

							}elseif ($length < 5 && $length >= 1) {

									return "Password should be greater than 3 charcaters";

							}

							return;

					}

								if ($_SERVER["REQUEST_METHOD"] == "POST") {

													if (empty($_POST["username"])) {
															$perr = "Username is required...!";
															$boolean = false;

													}else {
															$username = validate_inputs($_POST["username"]);
															$boolean = true;

													}

													if (empty($_POST["email_address"])) {
															$fnerr = "Email address is required...!";
															$boolean = false;

													}elseif(!filter_var($_POST["email_address"], FILTER_VALIDATE_EMAIL)) {
															$email_address = " Inavild email_address";
															$boolean = false;

													}else {

														$email_address = validate_inputs($_POST["email_address"]);

													}


													if (empty($_POST["password"])) {
															$gerr = "Password is required...!";
															$boolean = false;

													}elseif($length) {
															$gerr = $length;
															$boolean = true;

													}else {
														$password = validate_inputs($_POST["password"]);
														$boolean = true;
													}

													if (isset($_POST["check1"])) {

															$boolean = true;

													}else {

															$boolean = false;

													}


								}


                  $sql = "SELECT * FROM users WHERE email_address = '".$_POST["email_address"]."'";
				  $username = "SELECT * FROM users WHERE username = '".$_POST["username"]."'";

									$result = $conn->query($sql);
									$user_result = $conn->query($username);

					 if ($result->num_rows > 0) {

                        die("Sorry, your e-mail already exists in our database!");

                      }elseif ($user_result->num_rows > 0) {

                      	die("Someone under that username already exists in our database!");

					 }else{

								 $password = md5('password');
                          $sql = "INSERT INTO users(username,email_address,password) VALUES('".$_POST["username"]."','".$_POST["email_address"]."','$password')";

                            if ($conn->query($sql) === TRUE) {

                               // header('location: login.php');
															  echo"<script>alert('You have sucessfully registered...!');</script>";
                            }
                            else {

                                echo"<script>alert('Something went wrong');</script>";

                          }

            }


						  $conn->close();

      }elseif (isset($_POST['btn-login'])) {
		$username = $_POST["username"];
		$password = $_POST["password"];

		if(trim($username)!= "" and trim($password)!= "")
		{

						//Sanitizes whatever is entered
						$username=stripcslashes($username);
						$password=stripcslashes($password);
						$username=strip_tags($_POST["username"]);
						$password=strip_tags($_POST["password"]);

						$username= mysqli_real_escape_string($conn,$username);
						$password= mysqli_real_escape_string($conn,$password);

						//SQL Query
						$password = md5('password');
						$query = mysqli_query($conn,"SELECT * FROM users WHERE username ='$username' AND password ='$password'");
						//apply mysqli
						$numrows= mysqli_num_rows($query);

						if($numrows >0)
						{

							 //session username
							$_SESSION["username"]= $username;

								 header('location: ../student-dashboard/dashboard.php');
								 echo "<script>alert('Login successful');</script>";

						   }else
						   {

								 echo "Failed to login! Check if your password and username are valid";

						   }

					  }

					  $conn->close();

					}
