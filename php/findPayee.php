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

    date_default_timezone_set('America/Toronto');
    
    $today = date('Y-m-d');
            
    $sql = "SELECT * FROM `member` WHERE RegistrationDate='$today'";
?>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="card">
                            
                            <div class="header">
                                <h4 class="title">Members Who Have Fees To Pay</h4>
                            </div>
                            <div class="content">
                                <div class="row divider"></div>
<?php

    $result=mysqli_query($conn, $sql) or die("cannot execute query");

$count=mysqli_num_rows($result);

if($count==0){
    echo "It seems no members are set to pay today.";
}
else{
    while($row = mysqli_fetch_assoc($result)){ 
        extract($row);
        // MNO, License, FName, LName, Address, City, Province, Country, PhoneNo, Email, RegistrationDate, CreditNo, CreditExpDate, MonthlyFee, Password
        echo "<tr><td>$MNO</td>
            <td>$FName</td>
            <td>$LName</td>
            <td>$Email</td>
            <td>$PhoneNo</td>
            <td>$RegistrationDate</td>
            <td>$MonthlyFee</td></tr>";
      }
  }

?>
                            </div>
                            <div class="card-footer">
                                <p> </p>
                                <button type="button" class="btn btn-info btn-fill backToProfile pull-left" onclick="parent.location='../admin_index.html'">Back Home</button>
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
