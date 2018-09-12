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

$sql = 'SELECT * FROM `location`';
$result=mysqli_query($conn, $sql) or die("cannot execute query");
?>


<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="card">
            <form id="makeRes" method="post" action="php/car_check.php" class="cars">
                <div class="header">
                    <h4 class="title">Make a Reservation</h4>
                </div>
                <div class="content">
                    <div class="row divider"></div>
                    <h5><strong> Available Locations:</strong></h5>



<?php
	while($row = mysqli_fetch_assoc($result)){
        extract($row);
        echo "<div style='padding-left:50px;'> Location ID: $LocID  -- $Address  $City, $Province $Country</div><br>";
    }
?>
                    <div class="row divider"></div>
                    <div class="row">
                        <!-- <div class="col-md-5 col-sm-5"> -->
                        <div class="form-group">
                            <div class="col-md-3 col-sm-3">
                                <label class="control-label" style="line-height: 3;">Choose Location by ID: </label>
                            </div>
                            <div class="col-md-2 col-sm-5">
                                <input class="form-control" name="location" type="text" id="locationID">
                            </div>
                        </div>
                        <!-- </div> -->
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Pick up date: </label>
                                <input class="form-control" name="pickupdate" type="text" id="pickupdate" placeholder="yyyy-mm-dd">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Pick up time: </label>
                                <input class="form-control" name="pickuptime" type="text" id="pickuptime" placeholder="hh-mm-00">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Return date: </label>
                                <input class="form-control" name="returndate" type="text" id="returndate" placeholder="yyyy-mm-dd">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Return date: </label>
                                <input class="form-control" name="returntime" type="text" id="returntime" placeholder="hh-mm-00">
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
    <!-- 		<tr>
			<form name="form3" method="post" action="choosecar.php">
					<td>
					<table width="100%" border="0" cellpadding="3" cellspacing="1">
						<tr>
							<td colspan="2" style="text-align: right">Choose Location:</td>
							<td colspan="3"><input name="location" type="text" id="location"></td>
						</tr>
						<tr>
							<td colspan="2" style="text-align:right">Pick up date (yyyy-mm-dd): </td>
							<td colspan="2"><input name="pickupdate" type="text" id="pickupdate"></td>
						</tr>
						<tr>
							<td colspan="2" style="text-align:right">Pick up time (hh-mm-00): </td>
							<td colspan="2"><input name="pickuptime" type="text" id="pickuptime"></td>
						</tr>
						<tr>
							<td colspan="2" style="text-align:right">Return date: </td>
							<td colspan="2"><input name="returndate" type="text" id="returndate"></td>
						</tr>
						<tr>
							<td colspan="2" style="text-align:right">Return time: </td>
							<td colspan="2"><input name="returntime" type="text" id="returntime"></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td><input type="submit" name="Submit" value="Submit"></td>
						</tr>
					</table>
				</td>
			</form>
		</tr> -->
    <!-- </table> -->
