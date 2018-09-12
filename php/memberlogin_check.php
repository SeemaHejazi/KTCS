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

// username and password sent from form 
$Email=$_POST['email']; 
$Password=$_POST['password']; 


$sql="SELECT * FROM $tbl_name WHERE Email='$Email' and Password='$Password'";
$result=mysqli_query($conn, $sql);

// mysqli_num_row is counting table row
$count=mysqli_num_rows($result);

//MNO, License, FName, LName, Address, City, Province, Country, PhoneNo, Email, RegistrationDate, CreditNo, CreditExpDate, MonthlyFee, Password

// If result matched $Email and $Password, table row must be 1
if($count==1){
	session_start();
	$rows = mysqli_fetch_assoc($result);
	// echo $rows;
	extract($rows);

	 	$_SESSION['Email'] = $Email;
		$_SESSION['Password'] = $Password;
		$_SESSION['MNO'] = $MNO;
		$_SESSION['FName'] = $FName;
		$_SESSION['LName'] = $LName;
		$_SESSION['Address'] = $Address;
		$_SESSION['City'] = $City;
		$_SESSION['Province'] = $Province;
		$_SESSION['Country'] = $Country;
		$_SESSION['License'] = $License;
		$_SESSION['PhoneNo'] = $PhoneNo;
		$_SESSION['CreditNo'] = $CreditNo;
		$_SESSION['CreditExpDate'] = $CreditExpDate;
		$_SESSION['RegistrationDate'] = $RegistrationDate;
	
	 header("location:../member_index.html");
	// echo "$CreditExpDate";
	// echo "$FName, $LName, $Address, $City, $Province, $Country, $PhoneNo, $Email, $License, $RegistrationDate ";
}

else {
	 
	header("location:../index.html");
	echo "<p style='padding-top: 160px'><center>Incorrect ID or Password <br/><br/></center></p>";
}
?>