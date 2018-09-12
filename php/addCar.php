<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KTCS</title>
    <!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="../css/styles.css" rel="stylesheet">
    <!--  Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cabin|Raleway" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
</head>

<body>
    <div class="wrapper">
        <div class="main-panel" id="specialPages">
            <!-- Fixed navbar -->
            <nav class="navbar navbar-default" id="member-nav">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="member_index.html">Member</a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="index.html">LOG OUT</a></li>
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </nav>
            <div class="main-content">
            <!-- //VIN, Make, Model, Year, CurrentStatus, LastORead, LastGasRead, DateMaintain, MaintainOdomterReading -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="card">
                        <form id="newCarValidation" method="post" action="newcar_check.php" class="register">
                        <div class="header">
                            <h4 class="title">New Car Form</h4>
                        </div>

                        <div class="row divider"></div>
                    <div class="row">
                        <!-- <div class="col-md-5 col-sm-5"> -->
                        <div class="form-group">
                            <div class="col-md-3 col-sm-3">
                                <label class="control-label" style="line-height: 3;">VIN: </label>
                            </div>
                            <div class="col-md-2 col-sm-5">
                                <input class="form-control" name="vin" type="text" id="vin">
                            </div>
                        </div>
                        <!-- </div> -->
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Make: </label>
                                <input class="form-control" name="make" type="text" id="make"">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Model: </label>
                                <input class="form-control" name="model" type="text" id="model">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Year: </label>
                                <input class="form-control" name="year" type="text" id="year"">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Current Status: </label>
                                <input class="form-control" name="currentstatus" type="text" id="model">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label class="control-label">Last ORead: </label>
                                <input class="form-control" name="lastORead" type="text" id="lastORead"">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Last GasRead: </label>
                                <input class="form-control" name="lastGasRead" type="text" id="lastGasRead">
                            </div>
                        </div>
                    </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Date of Maintenance: </label>
                                    <input class="form-control" name="dateMaintain" type="text" id="dateMaintain"">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label class="control-label"> Maintenance O Read: </label>
                                    <input class="form-control" name="maintainOdomterReading" type="text" id="maintainOdomterReading">
                                </div>
                            </div>
                        </div>
                    
                    <div class="card-footer">
                                <button type="submit" class="btn btn-info btn-fill pull-right">Add Car</button>
                                <div class="clearfix"></div>
                                <button type="button" class="btn btn-info btn-fill backToProfile pull-left" onclick="parent.location='../admin_index.html'">Back Home</button><br>
                                <!-- <button type="submit" class="btn btn-info btn-fill pull-right">Submit</button> -->
                                <div class="clearfix"></div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</body>
