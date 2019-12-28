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
        // if ($conn->query($sql) === TRUE) {
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
                            <a class="nav-link" href="dashDBAdminEnterValue1.php">ENTER VALUE</a>   <!-- Check for Change necessaity.-->
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="#">MODIFY VALUE
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
                <br><br>
                <center>
                    <h1>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xs-12">
                            <center>
                                MODIFY VALUE OF VEHICLE TO DATABASE
                                <br>
                            </center>
                        </div>    
                    </h1>
                </center>
                
                <form name="myform" class="text" style="color: #757575;" action="dashDBAdminModifyValue.php" method="POST">
                    
                    <center>
                        
                        <h3>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                <center>
                                    CHOOSE YOUR CAR AND MODEL NUMBER
                                </center>
                            </div>    
                        </h3>
                        <br><br>


                        <script type="text/javascript">

                            function get_models()
                            {
                                var c=(document.getElementById("cars").value)
                                //alert(c);
                                xhr.onreadystatechange=function()
                                {
                                    if (this.readyState == 4 && this.status == 200)
                                    {
                                        var array = JSON.parse(this.responseText);
                                        
                                        var list=document.getElementById("models");
                                        //list.onchange=get_models;
                                        var first = list.firstElementChild; 
                                        while (first) 
                                        { 
                                            first.remove(); 
                                            first = list.firstElementChild; 
                                        }
                                        var p=document.createElement("option");
                                        p.innerHTML="SELECT YOUR CAR MODEL NUMBER";
                                        list.appendChild(p);
                                        for (index = 0; index < array.length; index++) { 
                                            p=document.createElement("option");
                                            p.innerHTML=array[index];
                                            p.value=array[index];
                                            list.appendChild(p);
                                        }
                                        
                                        //console.log(array);


                                    }
                                }
                                xhr.open("GET","models.php?car="+c,true);
                                xhr.send();


                            }



                            var xhr=new XMLHttpRequest();
                            xhr.onreadystatechange=function()
                            {
                                if (this.readyState == 4 && this.status == 200)
                                {
                                    var array = JSON.parse(this.responseText);
                                    var list=document.getElementById("cars");
                                    list.onchange=get_models;
                                    var first = list.firstElementChild; 
                                    while (first) 
                                    { 
                                        first.remove(); 
                                        first = list.firstElementChild; 
                                    }
                                    var p=document.createElement("option");
                                    p.innerHTML="SELECT YOUR CAR";
                                    list.appendChild(p);
                                    for (index = 0; index < array.length; index++) { 
                                        p=document.createElement("option");
                                        p.innerHTML=array[index];
                                        p.value=array[index];
                                        list.appendChild(p);
                                    }


                                }
                            }
                            xhr.open("GET","cars.php",true);
                            xhr.send();

                            function sub()
                            {
                                var c=(document.getElementById("cars").value);
                                var m=(document.getElementById("models").value);
                                document.myform.method="GET";
                                document.myform.action = "dashDBAdminModifyValue.php?name="+c+"&model="+m;
                                myform.submit();
                            }

                        

                        </script>






                        <div class="md-row mb-4">
                            <select name="car" id="cars" class="browser-default custom-select custom-select-md" style="border-radius: 0%;
                                                                                                  border-left: 0px; 
                                                                                                  border-right: 0px;
                                                                                                  border-top: 0px;
                                                                                                  border-bottom-color: black;
                                                                                                  background-color: inherit;">
                                <option selected>SELECT YOUR CAR</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                            <br><br>







                            <select name="model" id="models" class="custom-select custom-select-md" style="border-radius: 0%;
                                                                                                  border-left: 0px; 
                                                                                                  border-right: 0px;
                                                                                                  border-top: 0px;
                                                                                                  border-bottom-color: black;
                                                                                                  background-color: inherit;">
                                <option selected>SELECT YOUR CAR MODEL NUMBER</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>











                        </div>
                    </center>
                    <br><br>
                    <button s class="btn btn-primary btn-rounded btn-block button1" type="submit">SUBMIT QUERY</button>
                </form>
                
            </div>
        </main>
    </body>
</html>
