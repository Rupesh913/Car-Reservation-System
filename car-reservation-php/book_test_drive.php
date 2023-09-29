<!DOCTYPE html>
<html>
<head>
	<title>Book Test Drive</title>

	<?php include_once 'dependencies.php'; ?>
</head>
<body>
<?php require 'db_connect.php';

include_once 'header.php';

if(!isset($_SESSION['userSession']))
{
	header("Location: index.php");
}

?>


<div class="container">
<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
    	<form role="form">
			<h2>Fill The details </h2>
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
                        <input type="text" name="first_name" id="first_name" class="form-control input-lg" placeholder="First Name" tabindex="1" required="true">
					</div>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="text" name="last_name" id="last_name" class="form-control input-lg" placeholder="Last Name" tabindex="2" required="true">
					</div>
				</div>
			</div>
			<div class="form-group">
				<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" tabindex="3" required="true">
				</div>
				<div class="form-group">
				<input type="text" name="phone" id="phone" size class="form-control input-lg" placeholder="Phone" tabindex="4" required="true">
			</div>
		

			<div class="form-group">
			Enter a date <br>
			<input type="date" name="datepicker" id="datepicker" required="true"><br><br>

			</div>
<div class="form-group">
			  <div class="input-group bootstrap-timepicker timepicker">
            <input id="timepicker1" type="text" class="form-control input-small" required="true">
            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
        </div>
        </div>

<input type="submit" name="disbut" id="disbut" onclick="myFunction()" >


           </div>
           </form>
           </div>
           </div>
           </div>


<?php include_once 'footer.php'; ?>

