<!DOCTYPE html>
<html>
<head>
	<title>Account</title>
	<?php include_once 'dependencies.php';?>

<script type='text/javascript'>
function confirmDelete()
{
   return confirm("Are you sure you want to delete this?");
}
</script>

<body>
<?php
require 'db_connect.php';
include_once 'header.php';
$name = $model = $year = $description = '';

$select_user = (int) $_SESSION['userSession'];
if (!isset($_SESSION['userSession'])) {
	header("Location: index.php");
}
if (isset($_POST['add_car'])) {

	$model = $_POST['model'];
	$name = $_POST['name'];
	$year = $_POST['year'];
	$description = $_POST['description'];
	$AddQuery = "INSERT INTO car2 (model, name, year, description, user_id)
    VALUES ('$model','$name', '$year', '$description', '$select_user')";
	mysqli_query($con, $AddQuery);
	header("Location: account.php");
}
;

$select_car = "SELECT * FROM car2 WHERE user_id ='$select_user'";
$result = $con->query($select_car);

if (isset($_POST['delete_car'])) {
	$hidden = $_POST['hidden'];
	$DeleteQuery = "DELETE FROM car2 WHERE
    car_id='$hidden'";
	mysqli_query($con, $DeleteQuery);
	header("Location: account.php");
}
?>
<br>
  <table><caption><h3>Cars Table</h3></caption>
   <tr>
     <th>Car ID</th>
     <th>Name</th>
     <th>Model</th>

     <th>Description</th>
     </tr>
<?php
if ($select_car) {
	while ($row = $result->fetch_assoc()) {
		echo "<form action=account.php method=post>";
		echo "<tr>";
		echo "<td name>" . $row['car_id'] . " </td>";
		echo "<td>" . $row['model'] . " </td>";
		echo "<td>" . $row["name"] . " </td>";
		echo "<td>" . $row["year"] . " </td>";
		echo "<td>" . $row["description"] . " </td>";
		echo "<input type='hidden' name='hidden'  value=" . $row["car_id"] . " </td>";
		echo "<td>" . "<input type=submit name=delete_car value='Delete Car' onclick='return confirmDelete()' " . " </td>";
		echo "</tr>";
		echo "</form>";
	}}
?>
</table>
<hr class="colorgraph">
<div class="container">
<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
    	<form role="form" name="form" id="form" method="POST" >
    	<br>
			<h2>Add Cars </h2>
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
                        <input type="text" name="name" id="name" class="form-control input-lg" placeholder="Manufacturer" tabindex="1" required="true">
					</div>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="text" name="model" id="model" class="form-control input-lg" placeholder="Model" tabindex="2" required="true">
					</div>
				</div>
			</div>
			<div class="form-group">
				<input type="text" name="year" id="year" class="form-control input-lg" placeholder="Year" tabindex="3" pattern="[0-9]{4}" maxlength="4" size="4" required="true">
			</div>
					<div class="form-group">
						<textarea type="textarea editor" name="description" id="description" class="form-control" placeholder="Description" tabindex="4"></textarea>
					</div>
				</div>
			<div class="row">
				<div class="col-xs-6 col-sm-6 col-md-6 form-group">
				<input type="submit" name="add_car" id="add"  value="Add Car" class="btn btn-success add_car"></div>
			</div>
		</form>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>
<?php include_once 'footer.php';?>