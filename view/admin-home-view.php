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

    $ID = $_SESSION['ID'];
    $FName = $_SESSION['FName'];
    $LName = $_SESSION['LName'];
    $Position = $_SESSION['Position'];

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
    echo "<h4>Hi, $FName $LName</h4><br><br>";
    echo "<h5> <strong> ID Number:  </strong> $ID </h5><br>";
    echo "<h5> <strong> Your Position:  </strong> $Position </h5><br>";

    ?>

            </div>
        </div>
    </div>
</div>

