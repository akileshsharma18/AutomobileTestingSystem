<?php
    require 'config.php';
    session_start();
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
            <!-- Custom Script -->
            <script type="text/javascript" src="js/calendar.js"></script>

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
                            <a class="nav-link" href="#">
                                ENTER RANK
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="dashEndUser.php">
                                YOUR RANK
                            </a>
                        </li>
                    <ul class="navbar-nav ml-auto nav-flex-icons">
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
                
                <center>
                    <h1>
                        VEHICLE COMPARISON
                    </h1>
                </center>
                <br><br>    
                <div class="container">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xs-12">
                        <canvas id="es" style="width: 100%; height: 50%%;"></canvas><br><br>
                        <canvas id="eop" style="width: 100%; height: 50%%;"></canvas><br><br>
                        <canvas id="ms" style="width: 100%; height: 50%%;"></canvas><br><br>
                        <canvas id="nat" style="width: 100%; height: 50%%;"></canvas><br><br>
                        <canvas id="fa" style="width: 100%; height: 50%%;"></canvas><br><br>
                        <canvas id="art" style="width: 100%; height: 50%%;"></canvas>

                        
                        <script>
                            //bar
                            var esarr=[];
                            var eoparr=[];
                            var msarr=[];
                            var natarr=[];
                            var faarr=[];
                            var artarr=[];
                            var lab=[];
                            var back=[];
                            var bord=[];
                            <?php
                                $sql="select * from vehicles;";
                                $result = $db_cn->query($sql);
                                while($row=$result->fetch_assoc())
                                {?>
                                esarr.push(<?php echo($row["es"]);?>);
                                eoparr.push(<?php echo($row["eop"]);?>);
                                msarr.push(<?php echo($row["ms"]);?>);
                                natarr.push(<?php echo($row["nat"]);?>);
                                faarr.push(<?php echo($row["fa"]);?>);
                                artarr.push(<?php echo($row["art"]);?>);
                                lab.push("<?php echo($row["name"]);?>");
                                back.push(<?php echo("'rgba(255,99,132,0.2)'");?>);
                                bord.push(<?php echo("'rgba(255,99,132,1)'");?>);
                                <?php } 
                            if(isset($_SESSION["es"]))
                            {?>
                                esarr.push(<?php echo($_SESSION["es"]);?>);
                                eoparr.push(<?php echo($_SESSION["eop"]);?>);
                                msarr.push(<?php echo($_SESSION["ms"]);?>);
                                natarr.push(<?php echo($_SESSION["nat"]);?>);
                                faarr.push(<?php echo($_SESSION["fa"]);?>);
                                artarr.push(<?php echo($_SESSION["art"]);?>);
                                lab.push("<?php echo($_SESSION["name1"]);?>");
                                back.push(<?php echo("'rgba(54,162,235,0.2)'");?>);
                                bord.push(<?php echo("'rgba(54,162,235,1)'");?>);
                            <?php
                            }?>
                            console.log(back,bord,lab);
                            var ctxB = document.getElementById("es").getContext('2d');
                            var myBarChart = new Chart(ctxB, {
                                type: 'bar',
                                data: {
                                    labels:lab,
                                    datasets: [{
                                        label: 'Engine Speed(rpm)',
                                        data: esarr, //This is the place where data input is given.....do some 
                                                                    //php magic here on the data......
                                        backgroundColor: back,
                                        borderColor: bord,
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero: true
                                            }
                                        }]
                                    }
                                }
                            });
                            var ctxB2 = document.getElementById("eop").getContext('2d');
                            var myBarChart2 = new Chart(ctxB2, {
                                type: 'bar',
                                data: {
                                    labels:lab,
                                    datasets: [{
                                        label: 'Engine Oil Pressure(psi)',
                                        data: eoparr, //This is the place where data input is given.....do some 
                                                                    //php magic here on the data......
                                        backgroundColor: back,
                                        borderColor: bord,
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero: true
                                            }
                                        }]
                                    }
                                }
                            });
                            var ctxB3 = document.getElementById("ms").getContext('2d');
                            var myBarChart3 = new Chart(ctxB3, {
                                type: 'bar',
                                data: {
                                    labels:lab,
                                    datasets: [{
                                        label: 'Maximunm Speed(kmph)',
                                        data: msarr, //This is the place where data input is given.....do some 
                                                                    //php magic here on the data......
                                        backgroundColor: back,
                                        borderColor: bord,
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero: true
                                            }
                                        }]
                                    }
                                }
                            });
                            var ctxB4 = document.getElementById("nat").getContext('2d');
                            var myBarChart4 = new Chart(ctxB4, {
                                type: 'bar',
                                data: {
                                    labels:lab,
                                    datasets: [{
                                        label: 'Neck Axial Tension(kN)',
                                        data: natarr, //This is the place where data input is given.....do some 
                                                                    //php magic here on the data......
                                        backgroundColor: back,
                                        borderColor: bord,
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero: true
                                            }
                                        }]
                                    }
                                }
                            });
                            var ctxB5 = document.getElementById("fa").getContext('2d');
                            var myBarChart5 = new Chart(ctxB5, {
                                type: 'bar',
                                data: {
                                    labels:lab,
                                    datasets: [{
                                        label: 'Foot Acceleration(g)',
                                        data: faarr, //This is the place where data input is given.....do some 
                                                                    //php magic here on the data......
                                        backgroundColor: back,
                                        borderColor: bord,
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero: true
                                            }
                                        }]
                                    }
                                }
                            });
                            var ctxB6 = document.getElementById("art").getContext('2d');
                            var myBarChart6 = new Chart(ctxB6, {
                                type: 'bar',
                                data: {
                                    labels:lab,
                                    datasets: [{
                                        label: 'Airbag Release Time(ms)',
                                        data: artarr, //This is the place where data input is given.....do some 
                                                                    //php magic here on the data......
                                        backgroundColor: back,
                                        borderColor: bord,
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero: true
                                            }
                                        }]
                                    }
                                }
                            });
                        </script>
                    </div>
                </div>
            </center>
            
            
            
        </main>
    </body>
</html>