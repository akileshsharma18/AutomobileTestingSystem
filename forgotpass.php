<?php
session_start();
ob_start();
//header("Content-type:text/event-stream"); 
include("config.php"); //connect to db


mysqli_select_db($db_cn,"$dbname")or die("cannot select DB"); //Selecting db
$username=$_POST['emailid'];
$password=$_POST['pass'];
$cpassword=$_POST['cpass'];
$answer=$_POST['answer'];
$myusername = stripslashes($username);


if($password == $cpassword)
{
    $mypassword = stripslashes($password);
    $password=md5($mypassword);
    $result=mysqli_query($db_cn, "select * from `user_info` where username='$myusername'");
    $count=mysqli_num_rows($result);
        if($count==1)
        {
            $row = mysqli_fetch_array($result);
			$res=$row["answer"];
            if($answer == $res)
            {
                $q_string2="UPDATE `user_info` SET password='$password' WHERE username='$username'";
                $res=mysqli_query($db_cn, $q_string2);
                if($res)
                {
                    echo "<script>alert('Account Password changed Successfully!'); location.href='index.php';</script>";
                    //header("location:index.php");
                }
            }
            
            //Using ajax inform user that password changed. 

        }
        else
        {

            echo "<script>alert('Username not Available!'); location.href='index.php';</script>";


            //header("location:index.php");
            //Using ajax inform user username not available.	
                
                
        } 
}
					
else{
    header("location:index.php");
    //Alert password doesn't match
}

?>