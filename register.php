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
                <li class="active"><a href="register.php">REGISTER</a></li>
                <!-- "register.php" -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>LOGIN</b> <span class="caret"></span></a>
                    <ul id="login-dp" class="dropdown-menu">
                        <li>
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form" role="form" method="post" action="php/memberlogin_check.php" accept-charset="UTF-8" id="login-nav">
                                        <h5 class="text-center">Log In</h5>
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
                                                <button type="submit" class="btn btn-info btn-block">Sign in</button>
                                            </div>
                                    </form>
                                </div>
                                <div class="bottom text-center">
                                    New here? <a href="#"><b>Join Us</b></a>
                                    <br><br>
                                    <a href="login.php"><b>ADMIN LOGIN</b></a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- "login.html"-->
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
                    <form id="registerFormValidation" method="post" action="php/registration_check.php" class="register">
                        <div class="header">
                            <h4 class="title">Registration Form</h4>
                        </div>
                        <div class="content">
                            <div class="row divider"></div>
                            <h5 class="text-center">Account Information</h5>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">First Name
                                            <star>*</star>
                                        </label>
                                        <input class="form-control" name="firstName" type="text" required="true" autocomplete="off" placeholder="John" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Last Name
                                            <star>*</star>
                                        </label>
                                        <input class="form-control" name="lastName" type="text" required="true" autocomplete="off" placeholder="Doe" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Email Address
                                    <star>*</star>
                                </label>
                                <input class="form-control" name="email" type="text" required="true" autocomplete="off" placeholder="JohnDoe@apples.com" />
                            </div>
                            <div class="form-group">
                                <label class="control-label">Password
                                    <star>*</star>
                                </label>
                                <input class="form-control" name="password" id="registerPassword" type="password" required="true" />
                            </div>
                            <div class="form-group">
                                <label class="control-label">Confirm Password
                                    <star>*</star>
                                </label>
                                <input class="form-control" name="password_confirmation" id="registerPasswordConfirmation" type="password" required="true" equalTo="#registerPassword" />
                            </div>
                            <div class="row divider"></div>
                            <h5 class="text-center">Personal Information</h5>
                            <div class="form-group">
                                <label class="control-label">Phone Number
                                    <star>*</star>
                                </label>
                                <input class="form-control" name="phone" type="text" required="true" number="true" autocomplete="off" placeholder="61312345678" />
                            </div>
                            <div class="form-group">
                                <label class="control-label">Address
                                    <star>*</star>
                                </label>
                                <input class="form-control" name="address" type="text" required="true" autocomplete="off" placeholder="Unit Number, Street" />
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label">City
                                            <star>*</star>
                                        </label>
                                        <input class="form-control" name="city" type="text" required="true" autocomplete="off" placeholder="Kingston" />
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label">Province
                                            <star>*</star>
                                        </label>
                                        <input class="form-control" name="province" type="text" required="true" autocomplete="off" placeholder="ON" />
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label">Country
                                            <star>*</star>
                                        </label>
                                        <input class="form-control" name="country" type="text" required="true" autocomplete="off" placeholder="Canada" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Driver's License Number
                                    <star>*</star>
                                </label>
                                <input class="form-control" name="license" type="text" required="true" autocomplete="off" placeholder="KKK-123" />
                            </div>
                            <div class="row divider"></div>
                            <h5 class="text-center">Payment Information</h5>
                            <div class="row">
                                <div class="col-md-8 col-sm-8">
                                    <div class="form-group">
                                        <label class="control-label">Credit Card Number
                                            <star>*</star>
                                        </label>
                                        <input class="form-control" name="creditCard" type="text" required="true" autocomplete="off" placeholder="4520234..." />
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label">Expiry Date
                                            <star>*</star>
                                        </label>
                                        <input class="form-control" name="expiryDate" type="text" required="true" autocomplete="off" placeholder="2018-01-00" />
                                    </div>
                                </div>
                            </div>
                            <div class="category">
                                <star>*</star> Required fields</div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info btn-fill pull-right">Register</button>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <p>&copy; 2017 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
    </footer>
</div>
<!-- /.container -->
<!-- Bootstrap core JavaScript -->
<script src="dist/js/jquery.min.js"></script>
<script src="dist/js/bootstrap.min.js"></script>
</body>
