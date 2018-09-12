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

    $sql = 'SELECT * FROM Car';
    $result=mysqli_query($conn, $sql) or die("cannot execute query");
?>

<!-- //VIN, Make, Model, Year, CurrentStatus, LastORead, LastGasRead, DateMaintain, MaintainOdomterReading -->

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Car List</h4>
            </div>
            <div class="row divider"></div>
            <div class="content table-responsive table-full-width" id="memberlist">
            <table class='table table-striped bordered'>
                <thead>
                    <tr><td>VIN </td>
                    <td> Make</td>
                    <td> Model</td>
                    <td> Year</td>
                     <td>CurrentStatus</td>
                     <td>Last Odometer Reading</td>
                     <td>Last Gas Reading</td>
                     <td>Maintainance Date</td>
                     <td>Maintainance Odometer</td></tr>
                    
                </thead>
                <tbody>
                <?php
 while($row = mysqli_fetch_assoc($result)){
            extract($row);
            echo "
                  <tr><td>$VIN </td>
                    <td> $Make</td>
                    <td> $Model</td>
                    <td> $Year</td>
                     <td> $CurrentStatus</td>
                     <td> $LastORead</td>
                     <td> $LastGasRead</td>
                     <td> $DateMaintain</td>
                     <td> $MaintainOdomterReading</td></tr>";
              }

?>
                </tbody>
            </table>
         </div>
         <div class="card-footer">
                <a href='php/addCar.php'><button type="submit" class="btn btn-info btn-fill pull-right">Add New Car</button></a>
                <div class="clearfix"></div>
        </div> 
        </div>
    </div>
</div>

