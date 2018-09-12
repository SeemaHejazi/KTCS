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

    $MNO = $_SESSION['MNO'];
    $License = $_SESSION['License'];
    $FName = $_SESSION['FName'];
    $LName = $_SESSION['LName'];
    $Address = $_SESSION['Address'];
    $City = $_SESSION['City'];
    $Province = $_SESSION['Province'];
    $Country =$_SESSION['Country'];
    $PhoneNo = $_SESSION['PhoneNo'];
    $Email = $_SESSION['Email'];
    $Password = $_SESSION['Password'];
    $CreditNo = $_SESSION['CreditNo'];
    $CreditExpDate = $_SESSION['CreditExpDate'];
    $RegistrationDate = $_SESSION['RegistrationDate'];
?>
    <div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="card">
            <div class="header">
                <h4 class="title">Welcome Back!</h4>
            </div>
            <div class="content">
            <div class='row divider'></div>
<?php
    echo "<h4>Hi, $FName $LName </h4><br><br>";
    echo "<h5> <strong> Membership Number:  </strong> $MNO </h5><br>
            <h5> <strong> Email:  </strong> $Email </h5><br>
            <h5> <strong> Phone Number:   </strong>$PhoneNo </h5><br>
            <h5> <strong> Address:   </strong> $Address  $City, $Province $Country </h5><br>
            <h5> <strong> License number:   </strong> $License</h5><br>
            <h5> <strong> Registration Date:   </strong> $RegistrationDate </h5><br>"



        // Address: $Address  $City, $Province $Country <br />License number: $License<br />Registration Date: $RegistrationDate <br /><br /><br /></center>";
    // echo "</p>";
?>

            </div>
        </div>
    </div>
</div>
