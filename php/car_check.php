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

$locID=$_POST['location']; 
$pickupdate = $_POST['pickupdate']; 
$pickuptime = $_POST['pickuptime']; 
$returndate = $_POST['returndate']; 
$returntime = $_POST['returntime']; 

session_start();
$_SESSION['Location'] = $locID;
$MNO = $_SESSION["MNO"];
?>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="card">
                        <form id="makeRes" method="post" action="confirmation.php" class="cars">
                            <div class="header">
                                <h4 class="title">Make a Reservation Continued</h4>
                            </div>
                            <!-- <div class="content"> -->
                            <div class="row divider"></div>
                            <h5><strong> Available Cars:</strong></h5>

<?php
$sql="SELECT * FROM `car` NATURAL JOIN `CarLocated` WHERE LocID='$locID' AND CurrentStatus!='out-for-maintenance'";
$result=mysqli_query($conn, $sql);

$current_date = date("Y-m-d");	
$availability = true;	

if($pickupdate < $current_date OR $returndate < $current_date OR mysqli_num_rows($result) == 0 OR $returndate < $pickupdate){
echo "<center>No available cars at this location during the requested period</center>";
$availability = false;
}
?>

                        	<div class="content table-responsive table-full-width" id="cars">
                                <table class='table table-striped bordered'>
                                    <thead>
                                        <tr>
                                            <th>VIN</th>
                                            <th>Make</th>
                                            <th>Model</th>
                                            <th>Year</th>
                                            <th>Last Odometer Reading</th>
                                            <th>Last Gas Tank Reading</th>
                                            <th>Last Maintenance Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>

<?php
if ($availability == true){
	while($row = mysqli_fetch_assoc($result))
	{	
	$availability = true;
	extract($row);
	$sql2="SELECT * FROM `reservation` NATURAL JOIN `CarRentalHistory` WHERE VIN='$VIN'";
	$result2=mysqli_query($conn, $sql2) or die("cannot execute query2");
	
	
		if (mysqli_num_rows($result2) != 0){
			while($row2 = mysqli_fetch_assoc($result2)){
				if ($pickupdate >= $row2["PickUPDate"]){
					if ($pickupdate <= $row2["DropOFFDate"] OR $returndate <= $row2["DropOFFDate"]){
						$availability = false;
					}
				}
				elseif ($pickupdate < $row2["PickUPDate"]){
					if ($returndate >= $row2["DropOFFDate"] OR $returndate >= $row2["DropOFFDate"]){
						$availability = false;
					}
				}
			}
			if ($availability == true){
				echo "<tr><td>$VIN</td><td>$Make</td><td>$Model</td><td>$Year</td> 
				<td>$LastORead</td><td>$LastGasRead</td><td>$DateMaintain</td></tr>";
			}
		}
		else{
			echo "<tr><td>$VIN</strong></td><td>$Make</td><td>$Model</td><td>$Year</td> 
			<td>$LastORead </td><td>$LastGasRead</td><td>$DateMaintain</td></tr>";
		}
	}
}
?>
                                    </tbody>
                                </table>
                            </div>
<?php

if ($availability == true){
$_SESSION['pickupdate'] = $pickupdate;
$_SESSION['pickuptime'] = $pickuptime;
$_SESSION['returndate'] = $returndate;
$_SESSION['returntime'] = $returntime;
}
?>
							<div class="row divider"></div>
							<div class="row">
							    <!-- <div class="col-md-5 col-sm-5"> -->
							    <div class="form-group">
							        <div class="col-md-3 col-sm-3">
							            <label class="control-label" style="line-height: 3;">Choose Car by VIN: </label>
							        </div>
							        <div class="col-md-2 col-sm-5">
							            <input class="form-control" name="vin" type="text" id="VIN">
							        </div>
							        <div class="col-md-4 col-sm-5"> </div>
							        <div class="col-md-2 col-sm-5 ">
							            <button type="submit" class="btn btn-info btn-fill pull-right">Submit</button>
								    	<div class="clearfix"></div>
							        </div>
							    </div>
							    <!-- </div> -->
							</div>
							<!-- div class="row">
							    <div class="col-md-6 col-sm-6">
								    <button type="submit" class="btn btn-info btn-fill pull-right">Submit</button>
								    <div class="clearfix"></div>
							    </div>
							</div> -->
						
							<div class="card-footer">
								<p> </p>
								
								<button type="button" class="btn btn-info btn-fill backToProfile pull-left" onclick="parent.location='../member_index.html'">Back Home</button><br>
						    	<!-- <button type="submit" class="btn btn-info btn-fill pull-right">Submit</button> -->
						    	<div class="clearfix"></div>
							</div>
				</form>
			</div>
		</div>
	</div>



            <!-- echo  -->
            <!-- "
<table width='800' border='0' align='center' cellpadding='0' cellspacing='1' style='padding-top: 20px'>
	<tr>
		<form name='form3' method='post' action='confirmation.php'>
			<td>
				<table width='100%' border='0' cellpadding='3' cellspacing='1' bgcolor='#eee' style='border-radius: 10px'>
					<tr>
						<td colspan='2'>Choose Car (enter VIN):</td>
						<td colspan='3'><input name='VIN' type='text' id='VIN'></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td><input type='submit' name='submit' value='Submit'></td>
					</tr>
				</table>
			</td>
		</form>

	</tr>
</table>"; -->
            <!-- }
?>
<div style="width: 800px; margin: 0 auto; padding-top: 20px">
    <button type="button" class="backToProfile" onclick="parent.location='make-reservation.php'">Back To Choosing Location</button></br>
 </div> -->

</body>
<script src="../dist/js/jquery.min.js"></script>
<script src="../dist/js/bootstrap.min.js"></script>
<script src="../js/member-ctr.js"></script>
</html>
