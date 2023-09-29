<!DOCTYPE html>
<html>
<head>
	<title>Login Or Register</title>

	<?php 	include_once 'dependencies.php'; ?>
	</head>
<body>
<?php
	require 'db_connect.php';
	include 'header.php';

	


 

if(isset($_SESSION['userSession'])!="")
{
	header("Location: account.php");
}

if(isset($_POST['submit']))
{
	$uname = $con->real_escape_string(trim($_POST['username']));
	$email = $con->real_escape_string(trim($_POST['email']));
	$upass = $con->real_escape_string(trim($_POST['password']));
	$fname = $con->real_escape_string(trim($_POST['first_name']));
	$lname = $con->real_escape_string(trim($_POST['last_name']));
	$phone = $con->real_escape_string(trim($_POST['phone']));
	$upass2 = $con->real_escape_string(trim($_POST['password_confirmation']));
	$query= '';


if ($upass==$upass2){
	
	$upass = password_hash($upass, PASSWORD_DEFAULT);
	
	$check_email = $con->query("SELECT user_email FROM users WHERE user_email='$email'");
	$count=$check_email->num_rows;
	
	if($count==0){
		
		
		$query = "INSERT INTO users(username,user_email,user_pass, user_phone, user_lname, user_fname) VALUES('$uname','$email','$upass', '$phone', '$lname', '$fname')";
}
		
		if($con->query($query))
		{

		header("Location: account.php");

		}

		else
		{
			$msg = "<br> <div class='alert alert-danger'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; error while registering !
					</div>";

					echo $msg;
		}
	}
	else{
		
		
		$msg = "<br><div class='alert alert-danger'>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; sorry email already taken !
				</div>";
			echo $msg;
	}
	
	
}




?>
<br>
<div class="container">
<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
    	<form role="form" method="post" action="register.php">
			<h2>Please Sign Up </h2>
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
                        <input type="text" name="first_name" id="first_name" class="form-control input-lg" placeholder="First Name" tabindex="1">
					</div>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="text" name="last_name" id="last_name" class="form-control input-lg" placeholder="Last Name" tabindex="2">
					</div>
				</div>
			</div>
			<div class="form-group">
				<input type="text" name="username" id="username" class="form-control input-lg" placeholder="Display Name" tabindex="3">
			</div>
			<div class="form-group">
				<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" tabindex="4" required="true">
			</div>

			<div class="form-group">
				<input type="text" name="phone" id="phone" class="form-control input-lg" placeholder="phone number" tabindex="5">
			</div>
			<div class="row">
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" required="true" tabindex="5">
					</div>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="password" name="password_confirmation" id="password_confirmation" required="true" class="form-control input-lg" placeholder="Confirm Password" tabindex="6">
					</div>
				</div>
			</div>
			
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-6 col-md-6">
				<input type="submit" name="submit" id="submit" value="Register" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
				<div class="col-xs-6 col-md-6"><a href="login.php" class="btn btn-success btn-block btn-lg">Sign In</a></div>
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








<?php include_once 'footer.php'; 
 








