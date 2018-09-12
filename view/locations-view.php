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

    $sql = 'SELECT * FROM Location';
    $result=mysqli_query($conn, $sql) or die("cannot execute query");
?>

<!-- // LocID, Address, City, Province, Country, NumSpace  -->

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
                <tr>
                    <td> LocID </td>
                    <td> Address </td>
                    <td> City </td>
                    <td> Province </td>
                    <td> Country </td>
                    <td> NumSpace</td>
                </tr>
                </thead>
                <tbody>
                    <tr>

<?php


    while($row = mysqli_fetch_assoc($result)){
            extract($row);
            echo " <tr><td> $LocID </td>
                    <td> $Address </td>
                    <td> $City </td>
                    <td> $Province </td>
                    <td> $Country </td>
                    <td> $NumSpace</td></tr>";
                    }
?>
                 </tbody>
            </table>
         </div>
        </div>
    </div>
</div>