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

    
    $order = "SELECT * FROM Reservation natural join MemberRentalHistory";
    $result = mysqli_query($conn, $order);
?>


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Members Rental History And Reservations</h4>
            </div>
            <div class="row divider"></div>
            <div class="content table-responsive table-full-width" id="rentallist">
            <table class='table table-striped bordered'>
            <thead>

                <tr><td>Member Number</td>
                <td>Reservation Number</td>
                <td>Pick Up Date</td>
                <td>Pick Up Time</td>
                <td>Return Date</td>
                <td>Return Time</td>
                <td>Status</td></tr>
            </thead>
            <tbody>
<?php

while ($row=mysqli_fetch_array($result)){
    extract($row);
    
    echo " <tr><td>$MNO</td>
              <td>$ResNo</td>
              <td>$PickUPDate</td>
              <td>$PickUPTime</td>
              <td>$DropOFFDate</td>
              <td>$DropOFFTime</td>

              <td>$ResStatus</td>";
          }

?>
                </tbody>
            </table>
         </div>
        </div>
    </div>
</div>
