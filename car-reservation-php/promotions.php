<!DOCTYPE html>
<html>
<head>
	<title>Promotions</title>
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
<br><br><br><br><br>
<div class="alert alert-warning" align="center">
  <strong>No promotion found</strong> Please check Back Later.
</div>
</div>
<?php include_once 'footer.php'; ?>
