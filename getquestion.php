<?php
session_start();
extract($_GET);
header("Content-type:text"); 
include("config.php"); //connect to db
$username=$id;

mysqli_select_db($db_cn,"$dbname")or die("cannot select DB"); //Selecting db

$result=mysqli_query($db_cn, "select question from `user_info` where username='$username'");
        $count=mysqli_num_rows($result);
        if($count==1)
        {
           $row = mysqli_fetch_array($result);
	
			$res=$row["question"];
   
            echo $res;
                //header("location:index.php");

            //Using ajax inform user that password changed. 

        }
        else
        {

            echo "User question not available"; 
            
            //header("location:index.php");
            //Using ajax inform user username not available.	
                
                
        } 

?>        