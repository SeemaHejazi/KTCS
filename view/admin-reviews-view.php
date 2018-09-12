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


$query = mysqli_query($conn,"SELECT * FROM Review LEFT JOIN AdminResponse ON Review.ReviewID = AdminResponse.ReviewID");
?>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="card">
            <div class="header">
                <h4 class="title">REVIEWS</h4>
            </div>
            <div class="content">
            <!-- <div class="row divider"></div> -->
<?php

//fetch the results / convert results into an array
while($row = mysqli_fetch_array( $query )) {
    // echo out the contents of each row into a table
    extract($row);
    //ReviewID, CarReviewed, ReviewText
    echo    "<div class='row divider'></div>
            <strong>Review ID: </strong> $ReviewID <br> 
            <div class='row divider'></div>
            <label class='control-label'>Car VIN:</label> $CarReviewed <br>
            <label class='control-label'>Comment:</label> $ReviewText <br>
            <label class='control-label'>Staff:</label>   $ID  <br>
            <label class='control-label'>Response:</label> $ReplyText<br><br>";

    } 
?>
          </div> 
        </div>
        <div class="card">
<!-- <?php

//$reviewID = $_GET["reviewID"];

?> -->
            <form id="reviewValidation" method="post" action="php/reply_check.php" class="reply">
                <div class="header">
                    <h4 class="title">New Response</h4>
                </div>
                <div class="content">
                    <div class="row divider"></div>
                    <!-- <div class="row">                 -->
                    <div class="form-group">
                        <label class="control-label">Review ID:
                        </label>
                        <input class="form-control" name="reviewID" type="text"/>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Reply:
                        </label>
                        <textarea name="reply" class="form-control" placeholder="Here can be your nice text" rows="10"></textarea>
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