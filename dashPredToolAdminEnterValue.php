<?php
    require 'config.php';
    
?>
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
    if($type=='Predictor_Admin')
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
                            <a class="nav-link" href="#">DASHBOARD
                                <span class="sr-only">(current)</span>
                            </a>
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
                                PREDICTOR TOOL SETTINGS
                            </center>
                        </div>    
                    </h1>
                    
                </center>

                <br><br>

                <center>
                    <h4>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xs-12">
                            <center>
                                SELECT FORMULA TO MODIFY
                            </center>
                        </div> 
                    </h4>
                </center>
                
                <form class="text" style="color: #757575;" action="dashPredToolAdminEnterValue.php" method="post">                    
                <!-- Default inline 1-->
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="defaultInline1" name="formula" value="pbe">
                    <label class="custom-control-label" for="defaultInline1">PERFORMANCE BASED EVALUATION</label>
                </div>
                <!-- Default inline 2-->
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="defaultInline2" name="formula" value="sbe">
                    <label class="custom-control-label" for="defaultInline2">SAFETY BASED EVALUATION</label>
                </div>
                <!-- Default inline 3-->
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="defaultInline3" name="formula" value="le">
                    <label class="custom-control-label" for="defaultInline3">LOGARITHMIC EVALUATION</label>
                </div>
                <button class="btn btn-primary btn-rounded btn-block button1" type="submit" name="sub">CHOOSE FORMULA</button>
                </form> 
                <?php
                    $value="";
                    if(isset($_POST["sub"]))
                    {
                        $value=$_POST["formula"];
                        $_SESSION["value"]=$value;}
                    else{
                        $value="pbe";
                    }
                        if($value)
                        {
                            $sql="SELECT * from coef WHERE tof= '$value'";
                            $result = $db_cn->query($sql);
                            $row=$result->fetch_assoc();
                        }
                    
                    
                ?>
                <center>
                <form class="text" style="color: #757575;" action="dashPredToolAdminEnterValue.php" method="post">                    
                <label>A Current:<?php echo($row["A"]);?> New:</label>
                <input type="number" name="A" ><br><br>
                <label>B Current:<?php echo($row["B"]);?> New:</label>
                <input type="number" name="B"><br><br>
                <label>C Current:<?php echo($row["C"]);?> New:</label>
                <input type="number" name="C"><br><br>
                <label>D Current:<?php echo($row["D"]);?> New:</label>
                <input type="number" name="D"><br><br>
                <label>E Current:<?php echo($row["E"]);?> New:</label>
                <input type="number" name="E"><br><br>
                <label>F Current:<?php echo($row["F"]);?> New:</label>
                <input type="number" name="F"><br><br>
                <button class="btn btn-primary btn-rounded btn-block button1" type="submit" name="subcoef">UPDATE COEFFICIENTS</button>
                </form>
                </center>
                <?php
                    if(isset($_POST["subcoef"]))
                    {
                        $A=$_POST["A"];
                        $B=$_POST["B"];
                        $C=$_POST["C"];
                        $D=$_POST["D"];
                        $E=$_POST["E"];
                        $F=$_POST["F"];
                        echo($A);
                        $value=$_SESSION["value"];
                        if($A){
                            $sql="update coef set A='$A' WHERE tof= '$value';";
                            $query_run=$db_cn->query($sql);
                        }
                        if($B){
                            $sql2="update coef set B='$B' WHERE tof= '$value';";
                            $query_run2=mysqli_query($db_cn,$sql2);
                        }
                        if($C){
                            $sql3="update coef set C='$C' WHERE tof= '$value';";
                            $query_run3=mysqli_query($db_cn,$sql3);
                        }
                        if($D){
                            $sql4="update coef set D='$D' WHERE tof= '$value';";
                            $query_run4=mysqli_query($db_cn,$sql4);
                        }
                        if($E){
                            $sql5="update coef set E='$E' WHERE tof= '$value';";
                            $query_run5=mysqli_query($db_cn,$sql5);
                        }
                        if($F){
                            $sql6="update coef set F='$F' WHERE tof= '$value';";
                            $query_run6=mysqli_query($db_cn,$sql6);
                        }
                        echo '<script text/javascript> alert("Coefficients updated successfully")</script>';
                    }
                ?>
            </div>
        </main>
    </body>
</html>