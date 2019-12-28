<?php
session_start();
ob_start();
//header("Content-type:text/event-stream"); 
include("config.php"); //connect to db

	date_default_timezone_set('Asia/Kolkata');
	$date=date('d-m-Y H:i:s a');
	$date=(string)$date;

mysqli_select_db($db_cn,"$dbname")or die("cannot select DB"); //Selecting db

$username=$_POST['uname'];
$password=$_POST['pass'];
$cpassword=$_POST['cpass'];
$dept=$_POST['dept'];
$phno=$_POST['phno'];
$age=$_POST['age'];
$type=$_POST['type1'];
$que=$_POST['question'];
$ans=$_POST['answer'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];



if($password==$cpassword)
{
	$myusername = stripslashes($username);
				$mypassword = stripslashes($password);				
	$password=md5($mypassword);
					$result=mysqli_query($db_cn, "select * from `user_info` where username='$username'");
					$count=mysqli_num_rows($result);
						if($count==1)
						{
							echo "<script> alert('Username not available!'); location.href='index.php';</script>";

							//header("location:index.php");
							//Using ajax inform user username not available.

						}
						else
						{
							
							$q_string2="INSERT INTO `user_info` (`fname`, `lname`, `username`, `password`, `dept`, `phno`, `age`, `uid`, `user_type`, `question`, `answer`, `cooid`, `approval`) 
							VALUES ('$fname', '$lname', '$myusername', '$password', '$dept', '$phno', $age, NULL, '$type', '$que', '$ans', '', '1')";
							$res=mysqli_query($db_cn, $q_string2);
							if($res)
							{
								
								echo "<script>alert('User account created successfully!'); location.href='index.php';</script>";
								//header("location:index.php");
							}
								
								
								//Using ajax inform user to login. Account created successfully
						} 

}

else{
	header("location:index.php");
}

?>