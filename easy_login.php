<?php 
//session_start();
//error_reporting(0);
include("config.php"); //connect to db
mysqli_select_db($db_cn,"$dbname")or die("cannot select DB"); //Selecting db

		 
		 	if(isset($_COOKIE['cid']) && isset($_COOKIE['type']) && isset($_COOKIE['uname'])) //If the Cookie is set then login not required.
			{
		
				$type=$_COOKIE['type'];
				$ci=$_COOKIE['cid'];
				$uname=$_COOKIE['uname'];
				$query="SELECT * FROM user_info WHERE  username='$uname' AND cooid = '$ci' AND user_type = '$type' AND approval = '1'";
				$result1=mysqli_query($db_cn, $query);
                $count=mysqli_num_rows($result1); 
				if($count==1)
                {
					while($row = mysqli_fetch_array($result1)) 
					{		
						$uname=$row["username"];
						$name=$row["fname"];
						$type = $row["user_type"];
					}

				$_SESSION["username"] = $uname;		  
				$_SESSION["type"] = $type;
				$_SESSION["name"] = $name;

				if($type=="User")
					header("location:dashEndUserEnterValue.php");
				elseif($type=="DB_Admin")
					header("location:dashDBAdminEnterValue1.php");
				elseif($type=="Predictor_Admin")
					header("location:dashPredToolAdminEnterValue.php");
				else
					header("location:index.php");
				}					  
			}

			elseif(isset($_SESSION["username"])) //Check whether session is set. If yes then direct login.
			{
				$uname=$_SESSION["username"];
				$fname = $_SESSION["name"];
				$type = $_SESSION["type"];
				include("config.php"); //connect to db
				mysqli_select_db($db_cn,"$dbname")or die("cannot select DB"); //Selecting db
				$sql="SELECT * FROM user_info WHERE username='$uname' AND user_type='$type' AND approval = '1'";
				$result=mysqli_query($db_cn, $sql);
				$count=mysqli_num_rows($result); 
				if($count==1)
				{
					//Fetch details from respective DB/ predictor table and store it in variablea and can access in the html with ease
					if($type=="User")
						header("location:dashEndUserEnterValue.php");
					elseif($type=="DB_Admin")
						header("location:dashDBAdminEnterValue1.php");
					elseif($type=="Predictor_Admin")
						header("location:dashPredToolAdminEnterValue.php");
				}
				else
				{
					header("location:index.php");
				}    
			}
			
?>