<!DOCTYPE html>
<html>
<head>
	<title>Check Services</title>
	<?php include_once 'dependencies.php';?>
<body>
<?php
require 'db_connect.php';
include_once 'header.php';
$select_user = (int) $_SESSION['userSession'];
if (!isset($_SESSION['userSession'])) {
	header("Location: index.php");
}
$select_car = "SELECT * FROM car2 WHERE user_id ='$select_user'";
$result = $con->query($select_car);

$select_service = "SELECT * FROM car2, service WHERE `service`.`car_id` = `car2`.`car_id`
					AND `car2`.`user_id` = '$select_user'
					AND `service`.`status` = '1'";
$result2 = $con->query($select_service);

$success = '';

if (isset($_POST['submit'])) {
	$tires = $_POST['tires'];
	$engine = $_POST['engine'];
	$gearbox = $_POST['gearbox'];
	$chassis = $_POST['chassis'];
	$status = 0;
	$option = $_POST['option'];

	if (!$tires) {
		$tires = 0;
	}

	if ($tires) {
		$tires = 1;
	}

	if (!$engine) {
		$engine = 0;
	}

	if ($engine) {
		$engine = 1;
	}

	if (!$gearbox) {
		$gearbox = 0;
	}

	if ($gearbox) {
		$gearbox = 1;
	}

	if (!$chassis) {
		$chassis = 0;
	}

	if ($chassis) {
		$chassis = 1;
	}

	$AddQuery = "INSERT INTO service (car_id, gearbox, tires, engine, chassis, status)
    VALUES ('$option','$gearbox', '$tires', '$engine', '$chassis', '$status')";
	mysqli_query($con, $AddQuery);
	$success = 1;
	header("Location: message.php");

}?>

<br><br><br>
<?php

if ($select_car) {
	?>
<div class="container">
			<h2>Select A Service </h2>
			<hr class="colorgraph">
<form name="form" id="form" method="post">
<div class="row">
<select name="option">
<?php
while ($row = $result->fetch_assoc()) {
		echo "<option  value=" . $row['car_id'] . "> " . $row['name'] . " " . $row['model'] . "</option>";
	}
	?>
</select>
</div>
<br>
<div class="row">
	<label class="checkbox-inline">

      <input type="checkbox" name="gearbox">Fix gearbox
    </label>
    <label class="checkbox-inline">
      <input type="checkbox" name="chassis"> Fix chassis
    </label>
     <label class="checkbox-inline">
      <input type="checkbox" name="engine">Fix Engine
    </label>
    <label class="checkbox-inline">
      <input type="checkbox" name="tires">Change Tires
    </label>
</div>
<br>
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
<br>
<div class="row">
<input type="submit" name="submit" value="Submit">
</div>
</form>
<br> <br>
<?php } else {?>
<div class="alert alert-warning" align="center">
  <strong>No car found</strong> Please go to your account and add a car.
</div>

<?php }

if ($result2) {
	while ($row2 = $result2->fetch_assoc()) {

		echo "<div class='alert alert-success' align='center'><strong> Your " . $row2['name'] . " " .
			$row2['model'] . " " . $row2['year'] .
			"</strong> has been fixed, contact the car maintainace team for more info. </div>";
	}
}

?>


</div>

<?php include_once 'footer.php';?>