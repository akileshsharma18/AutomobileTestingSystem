<?php
//error_reporting(0);
session_start();
include("easy_login.php");
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
            
            <!-- Custom Scripts -->
            <script type="text/javascript" src="js/toggle_signup_signin.js"></script>
            
         
    </head>
    
    <body class="body_style">
        
        <main>
            
            <div class="row">
                <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    
                    <div class="show_login_button" id="show_login_button">
                        <div class="signup_option">
                            <center>
                                <h1>
                                    <br><br><br>
                                    ONLINE ATS
                                </h1>
                                <b><h3>NEW HERE? SIGN UP TO THE PLATFORM.</h3></b>
                                <br>
                                <button type="submit" id ="button1" class="btn peach-gradient btn-lg button1 button2">
                                    Sign Up
                                </button>
                            </center>
                        </div>
                    </div>
                    
                    <br>
                    <!-- Jumbotron -->
                    <div class="jumbotron text-center blue-grey lighten-5">

                        <!-- Title -->
                        <h2 class="card-title h2">NEW HERE? REGISTER HERE!</h2>

                        <form class="text-center" style="color: #757575;" action="signup.php" method="POST">
                            <div class="form-row">
                                <div class="col">
                                    <!-- First name -->
                                    <div class="md-form">
                                        <input type="text" id="materialRegisterFormFirstName" class="form-control" name="fname" requireds>
                                        <label for="materialRegisterFormFirstName">First name</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <!-- Last name -->
                                    <div class="md-form">
                                        <input type="text" id="materialRegisterFormLastName" class="form-control" name="lname">
                                        <label for="materialRegisterFormLastName">Last name</label>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- E-mail -->
                            <div class="md-form mt-0">
                                <input type="email" id="materialRegisterFormEmail" class="form-control" name = "uname" required>
                                <label for="materialRegisterFormEmail">E-mail</label>
                            </div>
                            
                            <!-- Password -->
                            <div class="md-form">
                                <input type="password" id="materialRegisterFormPassword" class="form-control" name="pass" required>
                                <label for="materialRegisterFormPassword">Password</label>
                            </div>
                            
                            <!-- Confirm Password -->
                            <div class="md-form">
                                <input type="password" id="materialRegisterFormPasswordConfirm" class="form-control" name = "cpass" required>
                                <label for="materialRegisterFormPasswordConfirm">Confirm Password</label>
                            </div>
                            
                            <!-- Department -->
                            <div class="md-form">
                                <input type="text" id="materialRegisterFormDepartment" class="form-control" name="dept" required>
                                <label for="materialRegisterFormDepartment">Department</label>
                            </div>

                            
                            
                            <div class="form-row">
                                <div class="col">
                                    <!-- Phone NO -->
                                    <div class="md-form">
                                        <input type="text" id="materialRegisterFormPhone" class="form-control" name="phno" required>
                                        <label for="materialRegisterFormPhone">Phone</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <!-- Age -->
                                    <div class="md-form">
                                        <input type="number" id="materialRegisterAge" class="form-control" name="age" min="18" max="100" required>
                                        <label for="materialRegisterAge">Age</label>
                                    </div>
                                </div>
                            </div>

                            <h4>
                                SELECT WHICH DEPARTMENT YOU BELONG
                            </h4>
                            <!-- Default inline 1-->
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="defaultInline1" name="type1" value = "User" required>
                                <label class="custom-control-label" for="defaultInline1">USER</label>
                            </div>

                            <!-- Default inline 2-->
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="defaultInline2" name="type1" value = "DB_Admin" required>
                                <label class="custom-control-label" for="defaultInline2">DATABASE ADMIN</label>
                            </div>

                            <!-- Default inline 3-->
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="defaultInline3" name="type1" value = "Predictor_Admin" required>
                                <label class="custom-control-label" for="defaultInline3">PREDICTOR ADMIN</label>
                            </div>

                            <div class="form-row">
                                <div class="col">
                                    <!-- Questions -->
                                    <div class="md-form">
                                        <input type="text" id="materialRegisterFormQuestion" class="form-control" name="question" required>
                                        <label for="materialRegisterFormQuestion">Question</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <!-- Answers -->
                                    <div class="md-form">
                                        <input type="text" id="materialRegisterFormAnswer" class="form-control" name="answer" required>
                                        <label for="materialRegisterFormAnswer">Answer</label>
                                    </div>
                                </div>
                            </div>
                            <br><br>
                            
                            <input class="btn btn-primary btn-rounded btn-block button1" value="Sign Up" type="submit" />
                        </form>
                    </div>
                    
                </div>
                
                <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    
                    <div class="show_signup_button" id="show_signup_button">
                        <div class="login_option">
                            <center>
                                <h1>
                                    <br><br><br>
                                    ONLINE ATS
                                </h1>
                                <b><h3>ALREADY A MEMBER. LOG IN.</h3></b>
                                <br>
                                <button type="submit" id ="button2" class="btn purple-gradient btn-lg button1 button2">
                                    Log In
                                </button>
                            </center>
                        </div>
                    </div>
                    
                    
                    
                    <br>
                    <!-- Jumbotron -->
                    <div class="jumbotron text-center blue-grey lighten-5">
                        <br>
                        <!-- Title -->
                        <h2 class="card-title h2">WELCOME BACK. LOGIN!</h2>

                        <form class="text-center" style="color: #757575;" action="login.php" method="POST">
                            <br><br>
                            <h4>
                                SELECT WHICH DEPARTMENT YOU BELONG
                            </h4>
                            <!-- Default inline 4-->
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="defaultInline4" name="type2" value = "User" required>
                                <label class="custom-control-label" for="defaultInline4">USER</label>
                            </div>

                            <!-- Default inline 5-->
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="defaultInline5" name="type2" value = "DB_Admin" required>
                                <label class="custom-control-label" for="defaultInline5">DATABASE ADMIN</label>
                            </div>

                            <!-- Default inline 6-->
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="defaultInline6" name="type2" value = "Predictor_Admin" required>
                                <label class="custom-control-label" for="defaultInline6">PREDICTOR ADMIN</label>
                            </div>
                            
                            <!-- Email -->
                            <div class="md-form">
                                <input type="email" id="materialLoginFormEmail" class="form-control" name="username" required>
                                <label for="materialLoginFormEmail">E-mail</label>
                            </div>

                            <!-- Password -->
                            <div class="md-form">
                                <input type="password" id="materialLoginFormPassword" class="form-control" name="password" required>
                                <label for="materialLoginFormPassword">Password</label>
                            </div>
                            
                             <div class="d-flex justify-content-around">
                                
                                    
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember" name="remember_me">
                                        <label class="custom-control-label" for="defaultLoginFormRemember">Remember me</label>
                                    </div>
                                 
                                <div>
                                    <!-- Forgot password -->
                                    <a href="forgotPassword.html">Forgot password?</a>
                                </div>
                            </div>
                            <br><br>
                            <input class="btn btn-danger btn-rounded btn-block button1" type="submit" value = "Log In"/>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        
    </body>
    
</html>