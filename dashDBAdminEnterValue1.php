<?php
session_start();
//error_reporting(0);
if(isset($_SESSION["username"]))
{
    $uname=$_SESSION["username"];
    $fname = $_SESSION['name'];
    $type = $_SESSION["type"];
    //include("config.php"); //connect to db
    //mysqli_select_db($db_cn,"$dbname")or die("cannot select DB"); //Selecting db
    if($type=='DB_Admin')
    {

    }
    else
    {
        header("location:index.php");
    }
}
else
    {
        header("location:index.php");
    }
?>
<html>
    <head>
        <title>ONLINE ATS</title>
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
                    ONLINE ATS
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-555"
                        aria-controls="navbarSupportedContent-555" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent-555">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">ENTER VALUE
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="dashDBAdminModifyValue1.php">MODIFY VALUE</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto nav-flex-icons">
                        <li>
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
            <div class="container">

                <center>
                    <h1>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xs-12">
                            <center>
                                ENTER A VEHICLE TO DATABASE
                            </center>
                        </div>    
                    </h1>
                </center>




                <form class="text" style="color: #757575;" action="dashDBAdminEnterValue.php" method="post">
                    <!-- Name of the vehicle -->
                    <div class="md-form form-lg">
                        <input name="name" type="text" id="materialRegisterFormFirstName" class="form-control">
                        <label for="materialRegisterFormFirstName">Name</label>
                    </div>
                        
                    <!-- Model of the vehicle -->
                    <div class="md-form form-lg">
                        <input name="model" type="number" id="materialRegisterFormLastName" class="form-control">
                        <label for="materialRegisterFormLastName">Model</label>
                    </div>
                            
                     <!-- Company of the vehicle -->
                    <div class="md-form form-lg">
                        <input name="company" type="text" id="materialRegisterCompany" class="form-control">
                        <label for="materialRegisterCompany">Company</label>
                    </div>
                            
                    <!-- Category -->
                    <div class="md-form form-lg">
                        <input name="category" type="text" id="materialRegisterCategory" class="form-control">
                        <label for="materialRegisterCategory">Category</label>
                    </div>
                    
                    <br>
                    <h4>PARAMETERS: </h4>
                    <br>
                    <!-- Style -->
                        <label for="customRange1">Engine Speed(rpm): <span id="demo1"></span></label>

                        <div class="md-form mt-0">
                                <input name="es" type="number" id="n1" class="form-control" required min="0" max="3500">
                                <label for="n1"></label>
                        </div>
                        
                        <br><br>
                        <!-- Performance -->
                        <label for="customRange2">Engine Oil Pressure(psi) : <span id="demo2"></span></label>
                        <div class="md-form mt-0">
                                <input name="eop" type="number" id="n2" class="form-control" required min="0" max="120">
                                <label for="n2"></label>
                        </div>
                                 
                        <br><br>    
                        <!-- Comfort -->
                        <label for="customRange3">Max Speed(kmph) : <span id="demo3"></span></label>
                        <div class="md-form mt-0">
                                <input name="ms" type="number" id="n3" class="form-control" required min="0" max="200">
                                <label for="n3"></label>
                        </div>
                        
                        <br><br>
                        <!-- Safety -->
                        <label for="customRange4">Neck Axial Tension(kN):<span id="demo4"></span></label>
                        <div class="md-form mt-0">
                                <input name="nat" type="number" step="0.1" id="n4" class="form-control" required min="0" max="4.8">
                                <label for="n4"></label>
                        </div>
                        
                        
                        <br><br>
                        <!-- Features -->
                        <label for="customRange5">Foot Acceleration(g): <span id="demo5"></span></label>
                        <div class="md-form mt-0">
                                <input name="fa" type="number" id="n5" class="form-control"  required min="130" max="260">
                                <label for="n5"></label>
                        </div>
                        
                        <br><br>
                        <!-- Green -->
                        <label for="customRange6">Airbag Release Time(ms): <span id="demo6"></span></label>
                        <div class="md-form mt-0">
                                <input name="art" type="number" id="n6" class="form-control" required min="2" max="10">
                                <label for="n6"></label>
                        </div>
                        <br><br>
                    
                    <button class="btn btn-primary btn-rounded btn-block button1" type="submit">ADD TO DATABASE</button>
                </form>













                
            </div>
        </main>
    </body>
</html>