
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

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //something posted
    // if (isset($_POST['submit'])) {
       

$pickupdate = $_SESSION['pickupdate']; 
$pickuptime = $_SESSION['pickuptime']; 
$returndate = $_SESSION['returndate']; 
$returntime = $_SESSION['returntime']; 

$VIN = $_POST['vin'];
$resStat = 'successful';

$resNo = (string)mt_rand(2000, 5555555);
$locID = $_SESSION['Location'];
$MNO = $_SESSION['MNO'];


echo "$resNo, $pickupdate, $pickuptime, $returndate, $returntime, $resStat";


$sql="SELECT * FROM `reservation` WHERE ResNo = '$resNo'";
$result=mysqli_query($conn, $sql);
        
while (mysqli_num_rows($result) != 0){ // reservationID already in the database
    $resNo = (string)mt_rand(1000000, 5555555);

    $sql="SELECT * FROM `reservation` WHERE ResNo = '$resNo'";
    $result=mysqli_query($conn, $sql);
}
        
// ResNo, PickUPDate, PickUPTime, DropOFFDate, DropOFFTime, ResStatus
$sql = "INSERT INTO Reservation values ('$resNo', '$pickupdate', '$pickuptime', '$returndate', '$returntime', '$resStat')";

$result=mysqli_query($conn, $sql);

        
//ResNo, VIN, MNO
$sql = "INSERT INTO MakeRes values ('$resNo', '$VIN', '$MNO')";
$result=mysqli_query($conn, $sql);

// ResNo, VIN, OReadPickup, OReadDropoff, StatusID
$sql = "INSERT INTO CarRentalHistory values ('$resNo','$VIN', '0', '0', '1')";

$result=mysqli_query($conn, $sql) or die("cannot insert car rental history");
        
        // // ReservationNum, VIN
        // $sql = "insert into Car_history values ('$resNo','$VIN')";
        // $result=mysqli_query($conn, $sql) or die("cannot insert car history");
        
// ReservationNum, MNO
$sql = "INSERT INTO MemberRentalHistory values ('$resNo','$MNO')";
$result=mysqli_query($conn, $sql);


$_SESSION['resNo'] = $resNo;
header("location: successful.php?vin=" .$VIN);
    // }
// }
?>
