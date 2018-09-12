<?php
$host="localhost"; // Host name 
$username="cisc332"; // Mysql username 
$password="cisc332password"; // Mysql password 
$db_name="KTCSNew"; // Database name 
$tbl_name="Member"; // Table name 

// Connect to server and select database.
$conn = mysqli_connect("$host", "$username", "$password");
if ( !$conn ) {
die("cannot connect"); 
}
mysqli_select_db($conn, "$db_name") or die("cannot select DB");

// MNO, License, FName, LName, Address, City, Province, Country, PhoneNo, Email, RegistrationDate, CreditNo, CreditExpDate, MonthlyFee, Password

$License = mysqli_real_escape_string($conn, $_POST['license']);
$FName = mysqli_real_escape_string($conn, $_POST['firstName']);
$LName = mysqli_real_escape_string($conn, $_POST['lastName']);
$Address = mysqli_real_escape_string($conn, $_POST['address']);
$City = mysqli_real_escape_string($conn, $_POST['city']);
$Province = mysqli_real_escape_string($conn, $_POST['province']);
$Country = mysqli_real_escape_string($conn, $_POST['country']);
$PhoneNo = mysqli_real_escape_string($conn, $_POST['phone']);
$Email = mysqli_real_escape_string($conn, $_POST['email']);
$Password = mysqli_real_escape_string($conn, $_POST['password']);
$CreditNo = mysqli_real_escape_string($conn, $_POST['creditCard']);
$CreditExpDate = mysqli_real_escape_string($conn, $_POST['expiryDate']);
    
$query=mysqli_query($conn,"SELECT * FROM Member WHERE Email='$Email' OR License='$License'");
$result=mysqli_query($conn, $query);
$rows=mysqli_num_rows($result);

if($rows==0){
	$MNO = (string)mt_rand(1000000, 5555555);
    $sql="INSERT INTO Member VALUES ('$MNO','$License', '$FName', '$LName','$Address', '$City', '$Province', '$Country','$PhoneNo', '$Email', NOW(), '$CreditNo', '$CreditExpDate', '10', '$Password');";

    $result=mysqli_query($conn, $sql) or die("died at inserting");

    if($result){
        echo "Account Successfully Created";
        Header ("Location:../index.html");
    }
} 
else {
	Header ("Location:../register.php");
}

?>

<!-- "(MNO, License, FName, LName, Address, City, Province, Country, PhoneNo, Email, RegistrationDate, CreditNo, CreditExpDate, MonthlyFee, Password) " -->