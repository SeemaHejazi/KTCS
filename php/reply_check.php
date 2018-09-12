<?php
$host="localhost"; // Host name 
$username="cisc332"; // Mysql username 
$password="cisc332password"; // Mysql password 
$db_name="KTCSNew"; // Database name 
$tbl_name="AdminResponse"; // Table name 

// Connect to server and select database.
$conn = mysqli_connect("$host", "$username", "$password");
if ( !$conn ) {
die("cannot connect"); 
}
mysqli_select_db($conn, "$db_name") or die("cannot select DB");


$ID = $_SESSION['ID'];
// $ReviewID = $_SESSION['reviewID'];
$reviewID = $_GET["reviewID"];
// $CarReviewed = mysqli_real_escape_string($conn, $_POST['reviewedcar']);
$ReplyText = mysqli_real_escape_string($conn, $_POST['reply']);

//ReviewID, ID, ReeplyText

$sql = "INSERT INTO AdminResponse VALUES ('$ReviewID', '$ID', '$ReplyText');";

$result = mysqli_query($conn, $sql) or trigger_error($conn->error."[$sql]");

if($result){
        echo "Thanks For the Comment! ";
        // Header ("Location:../view/feedback-view.php");
}

header("Location:../admin_index.html");

?>