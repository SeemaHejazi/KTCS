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

    $sql = 'SELECT * FROM Member';
    $result=mysqli_query($conn, $sql) or die("cannot execute query");
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">All Member Information</h4>
            </div>
            <div class="row divider"></div>
            <div class="content table-responsive table-full-width" id="memberlist">
            <table class='table table-striped bordered'>
                <thead>
                    <tr><td>First Name</td>
                  <td>Last Name</td>
                  <td>Member Number</td>
                  <td>Email</td>
                  <td>Phone</td>
                  <td>Address</td>
                  <td>City</td>
                  <!-- <td>Province </td> -->
                  <!-- <td>Country </td> -->
                  <td>License</td>
                  <td>Registration Date</td>
                  <td>Fees due</td></tr>
                </thead>
                <tbody>
<?php
 while($row = mysqli_fetch_assoc($result)){
            extract($row);
            echo "
                  <tr><td>$FName</td>
                  <td>$LName</td>
                  <td>$MNO</td>
                  <td>$Email</td>
                  <td>$PhoneNo</td>
                  <td>$Address</td>
                  <td>$City</td>
                 
                  
                  <td>$License</td>
                  <td>$RegistrationDate</td>
                  <td>$MonthlyFee</td></tr>";
              }

?>
                </tbody>
            </table>
         </div>
         <div class="card-footer">
                <a href='php/findPayee.php'><button type="submit" class="btn btn-info btn-fill pull-right">Today's Payee</button></a>
                <div class="clearfix"></div>
        </div> 
        </div>
    </div>
</div>

