<?php
session_start();
if(isset($_SESSION["username"]))
{
    $uname=$_SESSION["username"];
    $fname = $_SESSION['name'];
    $type = $_SESSION["type"];
    include("config.php"); //connect to db
    mysqli_select_db($db_cn,"$dbname")or die("cannot select DB"); //Selecting db
    /*$sql="SELECT * FROM user_info WHERE username='$uname' AND user_type='$type' AND approval = '1'";
    $result=mysqli_query($db_cn, $sql);
    $count=mysqli_num_rows($result); 
    if($count==1)
    {
        //Fetch details from respective DB/ predictor table and store it in variablea and can access in the html with ease
    }
    else
    {
        header("location:index.php");
    }*/
}
                
?>
<html>
    <head>
        <title>TESTIFICATION</title>
        <!-- CSS -->
            <!-- Font Awesome -->
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
            <!-- Bootstrap core CSS -->
            <link href="css/bootstrap.min.css" rel="stylesheet">
            <!-- Material Design Bootstrap -->
            <link href="css/mdb.min.css" rel="stylesheet">
            <!-- Google Fonts -->
            <link href='https://fonts.googleapis.com/css?family=Amiko' rel='stylesheet'>
            <!-- Custom Files -->
            <link rel="stylesheet" href="css/style.css">
        
        <!-- Scripts -->
            <!-- JQuery -->
            <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
            <!-- Bootstrap tooltips -->
            <script type="text/javascript" src="js/popper.min.js"></script>
            <!-- Bootstrap core JavaScript -->
            <script type="text/javascript" src="js/bootstrap.min.js"></script>
            <!-- MDB core JavaScript -->
            <script type="text/javascript" src="js/mdb.min.js"></script>

    </head>
    
    <body class="body_style">
        
        <header>

            <!--Navbar -->
            <nav class="mb-1 navbar navbar-expand-lg navbar-light winter-neva-gradient scrolling-navbar fixed-top">
                <a class="navbar-brand" href="#">
                    TESTIFICATION
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-555"
                        aria-controls="navbarSupportedContent-555" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent-555">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="dashEndUser.html">YOUR RANK
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="dashEndUserEnterValue.html">ENTER RANK</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto nav-flex-icons">
                        <li>
                        <a class="nav-link"><?php echo $fname?></a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link"><?php echo $fname?></a>
                        </li>    
                    
                        <li>
                            <a href="logout.php"><button type="button" class="btn btn-sm btn-primary button1">LOG OUT</button></a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- Navbar -->
        </header>
        
        <br><br><br><br>
        
        <main>
            <center>
                <h1>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xs-12">
                        <center>
                            YOUR VEHICLE'S RANK
                        </center>
                    </div>    
                </h1>
            </center>
            
        </main>
            </body>
</html> 