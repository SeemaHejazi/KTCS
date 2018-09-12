<?php
$host="localhost"; // Host name 
$username="cisc332"; // Mysql username 
$password="cisc332password"; // Mysql password 
$db_name="KTCSNew"; // Database name 
$tbl_name="Review"; // Table name 

// Connect to server and select database.
$conn = mysqli_connect("$host", "$username", "$password");
if ( !$conn ) {
die("cannot connect"); 
}
mysqli_select_db($conn, "$db_name") or die("cannot select DB");


$ReviewID = (string)mt_rand(1000, 9999);
$CarReviewed = mysqli_real_escape_string($conn, $_POST['reviewedcar']);
$ReviewText = mysqli_real_escape_string($conn, $_POST['comment']);

//ReviewID, CarReviewed, ReviewText

$sql = "INSERT INTO Review VALUES ('$ReviewID', '$CarReviewed', '$ReviewText');";

$result = mysqli_query($conn, $sql) or trigger_error($conn->error."[$sql]");

if($result){
        echo "Thanks For the Comment! ";
        header("Location:../member_index.html");
}


?>