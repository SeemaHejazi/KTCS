<?php
$host="localhost"; // Host name 
$username="cisc332"; // Mysql username 
$password="cisc332password"; // Mysql password 
$db_name="KTCSNew"; // Database name 

// Connect to server and select database.
$conn = mysqli_connect("$host", "$username", "$password");
if ( !$conn ) {
die("cannot connect"); 
}
mysqli_select_db($conn, "$db_name") or die("cannot select DB");

 //VIN, Make, Model, Year, CurrentStatus, LastORead, LastGasRead, DateMaintain, MaintainOdomterReading 

$VIN = mysqli_real_escape_string($conn, $_POST['vin']);
$Make = mysqli_real_escape_string($conn, $_POST['make']);
$Model = mysqli_real_escape_string($conn, $_POST['model']);
$Year = mysqli_real_escape_string($conn, $_POST['year']);
$CurrentStatus = mysqli_real_escape_string($conn, $_POST['currentstatus']);
$LastOdomterReading = mysqli_real_escape_string($conn, $_POST['lastORead']);
$LastGasTankReading = mysqli_real_escape_string($conn, $_POST['lastGasRead']);
$DateMaintain = mysqli_real_escape_string($conn, $_POST['dateMaintain']);
$MaintainOdomterReading = mysqli_real_escape_string($conn, $_POST['maintainOdomterReading']);

$sql=mysqli_query($conn,"INSERT INTO Car VALUES 
			('$VIN', '$Make', '$Model', '$Year', '$CurrentStatus', '$LastOdomterReading', '$LastGasTankReading', '$DateMaintain', '$MaintainOdomterReading')")
     or die (mysqli_error());

header("location:../admin_index.html");

