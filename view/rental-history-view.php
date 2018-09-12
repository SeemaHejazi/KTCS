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
    // $License = $_SESSION['License'];
    // $FName = $_SESSION['FName'];
    // $LName = $_SESSION['LName'];
    // $Address = $_SESSION['Address'];
    // $City = $_SESSION['City'];
    // $Province = $_SESSION['Province'];
    // $Country =$_SESSION['Country'];
    // $PhoneNo = $_SESSION['PhoneNo'];
    // $Email = $_SESSION['Email'];
    // $Password = $_SESSION['Password'];
    // $CreditNo = $_SESSION['CreditNo'];
    // $CreditExpDate = $_SESSION['CreditExpDate'];
    // $RegistrationDate = $_SESSION['RegistrationDate'];
    
    $query = "SELECT * FROM `Reservation` natural join `MemberRentalHistory` WHERE MNO = '$MNO'";
    $result = mysqli_query($conn, $query);
?>

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="card">
            <div class="header">
                <h4 class="title">Your Rental History</h4>
            </div>
            <div class="content">

<?php
    // $row = mysqli_fetch_assoc($result);
    
     while($row = mysqli_fetch_assoc($result))
    {   extract($row);
        // ResNo, PickUPDate, PickUPTime, DropOFFDate, DropOFFTime, ResStatus
        $_SESSION['ResNo'] = $ResNo;
        $_SESSION['PickUPDate'] = $PickUPDate;
        $_SESSION['PickUPTime'] = $PickUPTime;
        $_SESSION['DropOFFDate'] = $DropOFFDate;
        $_SESSION['DropOFFTime'] = $DropOFFTime;
        $_SESSION['ResStatus'] = $ResStatus;

        echo  " <div class='row divider'></div>
                <strong>Reservation Number:</strong> $ResNo <br>
                <div class='row divider'></div>
                <label class='control-label'>Pick up date:</label> $PickUPDate <br>
                <label class='control-label'>Pick up time:</label>  $PickUPTime <br> 
                <label class='control-label'>Drop off date:</label>  $DropOFFDate <br> 
                <label class='control-label'>Drop off time:</label>  $DropOFFTime <br>
                <label class='control-label'> Status:</label>  $ResStatus <br><br>";

        // "<br><br>Reservation Number: $ResNo <br> Pick up date: $PickUPDate <br> Pick up time: $PickUPTime <br>";
        // echo  "Drop off date: $DropOFFDate <br> Drop off time: $DropOFFTime <br> Status: $ResStatus " ;
        // if ($ResStatus == "successful"){
        //     $url = "cancel_reservation.php?ResNO=$ResNO";
        //     echo "<td><a href= $url>Cancel</a></td>";
        // }
     }
?>
            </div>
        </div>
    </div>
</div>
