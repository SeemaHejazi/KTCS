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

session_start();
		$pickupdate = $_SESSION['pickupdate']; 
		$pickuptime = $_SESSION['pickuptime']; 
		$returndate = $_SESSION['returndate']; 
		$returntime = $_SESSION['returntime']; 
		$resNo = $_SESSION['resNo'];
		$locID = $_SESSION['Location'];
		// $location = $_SESSION['Location'];
		$VIN = $_GET["vin"];

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
?>

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="card">
            <!-- <form id="makeRes" method="post" action="php/car_check.php" class="cars"> -->
                <div class="header">
                    <h4 class="title">Reservation Confirmed</h4>
                </div>
                <div class="content">
                    <div class="row divider"></div>

<?php
		// echo "$resNo, $pickupdate, $pickuptime, $returndate, $returntime, $resStat";
$sql = " SELECT * FROM `location` WHERE LocID = '$locID'";

$result=mysqli_query($conn, $sql) or die("cannot execute query");
$row = mysqli_fetch_assoc($result);
extract($row);

	// echo "<p style='padding-top: 100px'>";
	echo "<h4> Your reservation was successful!<b4>";
	echo "<h5> <strong>Reservation vehicle: </strong> $VIN </h5>";
	echo "<h5> <strong>Reservation Number:</strong> $resNo<br><br></h5>";
	echo "<h5> <strong>Pick up on: </strong> $pickupdate at $pickuptime <br></h5>";
	echo "<h5> <strong>Location ID: $locID  -- $Address  $City, $Province $Country</strong><br></h5><br>";

	echo "<h5> <strong>Return on: </strong> $returndate at $returntime <br></h5>";
	echo "<h5> <strong>Location ID: $locID  -- $Address  $City, $Province $Country</strong><br> </h5>";

	// echo "</p>";
	?>		
				</div>
				<div class="card-footer">
								<p> </p>
								
								<button type="button" class="btn btn-info btn-fill backToProfile pull-left" onclick="parent.location='../member_index.html'">Back Home</button><br>
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