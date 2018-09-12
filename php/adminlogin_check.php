<?php
$host="localhost"; // Host name 
$username="cisc332"; // Mysql username 
$password="cisc332password"; // Mysql password 
$db_name="KTCSNew"; // Database name 
$tbl_name="Admin"; // Table name 

// Connect to server and select database.
$conn = mysqli_connect("$host", "$username", "$password");
if ( !$conn ) {
die("cannot connect"); 
}
mysqli_select_db($conn, "$db_name") or die("cannot select DB");

// username and password sent from form 
$ID=$_POST['id']; 
$Password=$_POST['pass']; 

// To protect MySQL injection
//$ID = stripslashes($ID);
//$Password = stripslashes($Password);
//$ID = mysqli_real_escape_string($ID);

$ID = intval($ID);
$sql="SELECT * FROM $tbl_name WHERE ID='$ID' and Password='$Password'";
$result=mysqli_query($conn, $sql);

// mysqli_num_row is counting table row
$count=mysqli_num_rows($result);



// If result matched $ID and $Password, table row must be 1
if($count==1){
	session_start();
	$rows = mysqli_fetch_assoc($result);
	// echo $rows;
	extract($rows);
	$_SESSION['ID'] = $ID;
	$_SESSION['FName'] = $FName;
	$_SESSION['LName'] = $LName;
	$_SESSION['Position'] = $Position;

	header("location:../admin_index.html");
}
else {
	header("location:../login.php");

	 echo "<p style='padding-top: 160px'><center>Incorrect ID or Password <br/><br/></center></p>";
}
?>