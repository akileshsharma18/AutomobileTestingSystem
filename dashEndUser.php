
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
    if($type=='User')
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
                        <li class="nav-item">
                            <a class="nav-link" href="dashEndUserEnterValue.php">
                                ENTER RANK
                                
                            </a>

                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="dashEndUser.php">
                                YOUR RANK
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="graph.php">
                                GRAPH VISUALISATION
                                
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
            <center>
                <h3>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xs-12">
                        <center>
                            YOUR VEHICLE'S RANK
                        </center>
                    </div>    
                </h3>
            </center>
            
        </main>
        <?php
        include 'config.php';
            if(isset($_SESSION["value"]))
            {
                $value=$_SESSION["value"];
            }
            else
            {
                $value="pbe";
            }
            $sql="select * from coef WHERE tof= '$value'";
            $result = $db_cn->query($sql);
            $row=$result->fetch_assoc();
            
            $name=$_POST["name"];
            $model=$_POST["model"];
            $ues=$_POST["es"];
            $ueop=$_POST["eop"];
            $ums=$_POST["ms"];
            $unat=$_POST["nat"];
            $ufa=$_POST["fa"];
            $uart=$_POST["art"];
            $_SESSION["name1"]=$_POST["name"];
            $_SESSION["model"]=$_POST["model"];
            $_SESSION["ues"]=$_POST["es"];
            $_SESSION["ueop"]=$_POST["eop"];
            $_SESSION["ums"]=$_POST["ms"];
            $_SESSION["unat"]=$_POST["nat"];
            $_SESSION["ufa"]=$_POST["fa"];
            $_SESSION["uart"]=$_POST["art"];
            $sql2="select * from vehicles WHERE name= '$name' AND model='$model';";
            $result2 = $db_cn->query($sql2);
            $row2=$result2->fetch_assoc();

            $th_val=0;
            $user_val=0;
            switch($value){
                case "pbe":
                {
                    $th_val=$row["A"]*$row2["es"]+$row["B"]*$row2["eop"]+$row["C"]*$row2["ms"]+$row["D"]*$row2["nat"]+$row["E"]*$row2["fa"]+$row["F"]*$row2["art"];
                    $user_val=$row["A"]*$ues+$row["B"]*$ueop+$row["C"]*$ums+$row["D"]*$unat+$row["E"]*$ufa+$row["F"]*$uart;
                }
                case "sbe":
                {
                    $th_val=$row["A"]*$row2["es"]+$row["B"]*$row2["eop"]+$row["C"]*$row2["ms"]+$row["D"]*$row2["nat"]+$row["E"]*$row2["fa"]+$row["F"]*$row2["art"];
                    $user_val=$row["A"]*$ues+$row["B"]*$ueop+$row["C"]*$ums+$row["D"]*$unat+$row["E"]*$ufa+$row["F"]*$uart;
                }
                case "le":
                {
                    $th_val=log($row["A"]*$row2["es"])+log($row["B"]*$row2["eop"])+log($row["C"]*$row2["ms"])+log($row["D"]*$row2["nat"])+log($row["E"]*$row2["fa"])+log($row["F"]*$row2["art"]);
                    $user_val=log($row["A"]*$ues)+log($row["B"]*$ueop)+log($row["C"]*$ums)+log($row["D"]*$unat)+log($row["E"]*$ufa)+log($row["F"]*$uart);
                }
            }
            $diff=abs($th_val-$user_val);
            if($diff>0 && $diff<=0.5)
                $rank="EXCELLENT";
            elseif($diff>0.5 && $diff<=1)
                $rank="VERY GOOD";
            elseif($diff>1 && $diff<=1.5)
                $rank="GOOD";
            elseif($diff>1.5 && $diff<=2)
                $rank="AVERAGE";
            elseif($diff>2 && $diff<=2.5)
                $rank="POOR";
            else
                $rank="VERY POOR";
        ?>
        <br><br>
        <center>
        <h4>
        DEVIATION FROM OPTIMAL SCORE: <?php echo($diff);?>
        </h4>
        <br><br>
        <h4>
        OPTIMUM SCORE FOR <?php echo($name);?> : <?php echo($th_val);?>
        </h4>
        <br><br>
        <h4>
        RANK: <?php echo($rank);?>
        </h4>
        </center>
    </body>
</html>