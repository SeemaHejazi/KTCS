<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>KTCS</title>
<!-- Bootstrap core CSS -->
<link href="dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom styles for this page -->
<link href="css/styles.css" rel="stylesheet">
<!--  Fonts and icons     -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:800" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Cabin|Raleway" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
</head>

<body>
<?php

    $host="localhost"; // Host name 
    $username="cisc332"; // Mysql username 
    $password="cisc332password"; // Mysql password 
    $db_name="KTCSNew"; // Database name 
    $tbl_name="Member"; // Table name 

    // Connect to server and select databse.
    $conn = mysqli_connect("$host", "$username", "$password");
    if ( !$conn ) {
    die("cannot connect"); 
    }
    mysqli_select_db($conn, "$db_name") or die("cannot select DB");

?>
<!-- Fixed navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top">
<div class="container">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">K-Town Car Share</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
            <li><a href="index.html">HOME</a></li>
            <li><a href="register.php">REGISTER</a></li>
            <!-- "login"-->
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>LOGIN</b> <span class="caret"></span></a>
                <ul id="login-dp" class="dropdown-menu">
                    <li>
                        <div class="row">
                            <div class="col-md-12">
                                <form class="form" role="form" method="post" action="php/memberlogin_check.php" accept-charset="UTF-8" id="login-nav">
                                    <h5 class="text-center">Member Log In</h5>
                                    <div class="form-group">
                                        <label class="control-label">Email Address
                                            <star>*</star>
                                        </label>
                                        <input class="form-control" name="email" type="text" required="true" email="true" autocomplete="off" placeholder="JohnDoe@apples.com" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Password
                                            <star>*</star>
                                        </label>
                                        <input class="form-control" name="password" id="registerPassword" type="password" required="true" />
                                    </div>
                                    <div class="category">
                                        <star>*</star> Required fields</div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-info btn-block">Sign In</button>
                                    </div>
                                </form>
                            </div>
                            <div class="bottom text-center">
                                New here? <a href="register.php"><b>Join Us</b></a>
                                <br>
                                <br>
                                <a href="login.php"><b>ADMIN LOGIN</b></a>
                            </div>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <!--/.nav-collapse -->
</div>
</nav>
<div class="container main-content">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <form id="registerFormValidation" action="php/adminlogin_check.php" method="post">
                    <div class="header">
                        <h3 class="title">Welcome Back!</h3>
                    </div>
                    <div class="content">
                        <div class="row divider"></div>
                        <h5 class="text-center">ADMIN LOGIN</h5>
                        <div class="form-group">
                            <label class="control-label">ID
                                <star>*</star>
                            </label>
                            <input class="form-control" name="id" type="text" required="true" email="false" autocomplete="off" placeholder="12345" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Password
                                <star>*</star>
                            </label>
                            <input class="form-control" name="pass" id="registerPassword" type="password" required="true" />
                        </div>
                        <div class="category">
                            <star>*</star> Required fields</div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info btn-fill pull-right">Sign In</button>
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<footer class="footer">
    <p>&copy; 2017 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
</footer>
</div>
<!-- /.container -->
<!-- Bootstrap core JavaScript -->
<script src="dist/js/jquery.min.js"></script>
<script src="dist/js/bootstrap.min.js"></script>
</body>
