<?php 
session_start();
//error_reporting(0);
include("config.php"); //connect to db
mysqli_select_db($db_cn,$dbname)or die("cannot select DB1"); //Selecting db

date_default_timezone_set('Asia/Kolkata');
				//Fetching data from sigin page
				$myusername=$_POST['username'];
				$mypassword=$_POST['password'];
				$type=$_POST['type2'];
				$cook=$_POST['remember_me'];

				$myusername = stripslashes($myusername);
				$mypassword = stripslashes($mypassword);
						$mypassword = md5($mypassword); // Password encrpytion

						
				
				// Checking for user type. Through form data
						if($type!="")
						{
								$sql="SELECT * FROM user_info WHERE username='$myusername' AND password='$mypassword' AND user_type='$type' AND approval = '1'";
								$result=mysqli_query($db_cn, $sql);
								$count=mysqli_num_rows($result);
									if($count==1)
									{
										while($row = mysqli_fetch_array($result)) 
										{
											$name1=$row["fname"];
											$username=$row["username"];
											$type = $row["user_type"];
										}

									$_SESSION["username"] = $username;
									$_SESSION["name"] = $name1;
									$_SESSION["type"] = $type;
									
									if(isset($cook)) //If remember me is set
									{
										$val=10;
										$cid=createRandomVal($val);
										set_cookie($cid);
									}

										if($type=="User")
										{
											$_SESSION["type"] = "User";
											header("location:dashEndUserEnterValue.php");
										}	
										elseif($type=="DB_Admin")
										{
											$_SESSION["type"] = "DB_Admin";
											header("location:dashDBAdminEnterValue1.php");
										}
										elseif($type=="Predictor_Admin")
										{
											$_SESSION["type"] = "Predictor_Admin";
											header("location:dashPredToolAdminEnterValue.php");
										}
									}
										
									else   
										echo "<script> alert('Username not available!'); location.href='index.php';</script>";
						}
						
				
						elseif($type=="")
							echo "<script> alert('Type of User not set!'); location.href='index.php';</script>";

				function set_cookie($cid) //Setting cookies with id, name and uname and table name.
				{        
					
					include("config.php");
					mysqli_select_db($db_cn,$dbname)or die("cannot select DB1"); //Selecting db   
					$cid1=$cid;//md5($cid);
					$type1=$_SESSION["type"];
					$username=$_SESSION["username"];
					$name=$_SESSION["name"]; 
					$_SESSION["cid"]=$cid1;
					setcookie("cid", $cid1, time()+3600); 
					setcookie("type", $type1, time()+3600);
					setcookie("name", $name, time()+3600);
					setcookie("uname", $username, time()+3600);
					$s = "UPDATE user_info SET cooid='$cid1' WHERE username = '$username' ";
					mysqli_query($db_cn, $s) ;
				}

				function createRandomVal($val) //Creates a random value.
				{
					$chars="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789,-";
					srand((double)microtime()*1000000);
					$i = 0;
					$pass = '' ;
					while ($i<=$val) 
						{
						$num  = rand() % 33;
						$tmp  = substr($chars, $num, 1);
						$pass = $pass . $tmp;
						$i++;
						}
					return $pass;
				}



		
?>