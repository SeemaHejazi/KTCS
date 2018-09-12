<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KTCS</title>
    <!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="../css/styles.css" rel="stylesheet">
    <!--  Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cabin|Raleway" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
</head>

<body>
<div class="wrapper">
    <div class="main-panel" id="specialPages">
        <!-- Fixed navbar -->
        <nav class="navbar navbar-default" id="member-nav">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="member_index.html">Member</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.html">LOG OUT</a></li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </nav>
        <div class="main-content">
                    <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="card">
                        <!-- <form id="makeRes" method="post" action="php/car_check.php" class="cars"> -->
                        <div class="header">
                            <h4 class="title">Payment Status:</h4>
                        </div>
                        <div class="content">
                            <div class="row divider"></div>
<?php
$host="localhost"; // Host name 
$username="cisc332"; // Mysql username 
$password="cisc332password"; // Mysql password 
$db_name="KTCSNew"; // Database name 


// Connect to server and select databse.
$conn = mysqli_connect("$host", "$username", "$password");
if ( !$conn ) {
die("cannot connect"); 
}
mysqli_select_db($conn, "$db_name") or die("cannot select DB");

session_start();
$MNO = $_POST['MNO'];
$CreditCardNumber = $_POST['creditCard'];
$ExpireDate = $_POST['expiryDate'];

$sql = "UPDATE Member SET MonthlyFee = 0 WHERE MNO = '$MNO'";
$result = mysqli_query($conn, $sql);

if (!$result){
    die('There is some error with yours input: '.mysqli_error());
}
else{
    echo "<center><p>You have successfully payed your Membership Fee.</p></center>";
}

?>
                            </div>
                            <div class="card-footer">
                                <p> </p>
                                <button type="button" class="btn btn-info btn-fill backToProfile pull-left" onclick="parent.location='../member_index.html'">Back Home</button>
                                <br>
                                <!-- <button type="submit" class="btn btn-info btn-fill pull-right">Submit</button> -->
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>








