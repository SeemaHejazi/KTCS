<?php

$host="localhost"; // Host name 
$username="cisc332"; // Mysql username 
$password="cisc332password"; // Mysql password 
$db_name="KTCSNew"; // Database name 
// $tbl_name="Member"; // Table name 

// Connect to server and select databse.
$conn = mysqli_connect("$host", "$username", "$password");
if ( !$conn ) {
die("cannot connect"); 
}
mysqli_select_db($conn, "$db_name") or die("cannot select DB");

// $sql = 'SELECT * FROM `location`';
// $result=mysqli_query($conn, $sql) or die("cannot execute query");
?>


<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="card">
            <form id="makePay" method="post" action="php/pay_check.php" class="cars">
                <div class="header">
                    <h4 class="title">Make a Payment</h4>
                </div>
                <div class="content">
                    <!-- <div class="row divider"></div> -->
                    <!-- <h5><strong> Available Locations:</strong></h5> -->

                    <div class="row divider"></div>
                    <div class="row">
                        <!-- <div class="col-md-5 col-sm-5"> -->
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6">
                                <label class="control-label" style="line-height: 3;">Membership Number: </label>
                            </div>
                            <div class="col-md-6 col-sm-6">
                            	<input class="form-control" name="MNO" type="text" id="MNO" type="text" size="30" placeholder="19734130" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- <div class="col-md-5 col-sm-5"> -->
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6">
                                <label class="control-label" style="line-height: 3;">Credit Card Number: </label>
                            </div>
                            <div class="col-md-6 col-sm-6">
                            	<input class="form-control" name="creditCard" type="text" id="creditCard" placeholder="4520129873019281" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- <div class="col-md-5 col-sm-5"> -->
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6">
                                <label class="control-label" style="line-height: 3;">Expiry Date: </label>
                            </div>
                            <div class="col-md-6 col-sm-6">
                            	<input class="form-control" name="expiryDate" type="text" id="creditCard" placeholder="2017-07-02" />
                            </div>
                        </div>
                    </div>
                </div>
            <div class="card-footer">
                    <button type="submit" class="btn btn-info btn-fill pull-right">Submit</button>
                    <div class="clearfix"></div>
                </div> 
            </form>
        </div>
    </div>
</div>



