<!DOCTYPE html>
<html>
<head>
	<title>Login</title>

	<?php
	 	require 'db_connect.php';

	 include_once 'dependencies.php';
	 ?>
	 <body>
	 <?php
	 require 'header.php';


if(isset($_SESSION['userSession'])!="")
{
	header("Location: account.php");
	exit;
}

if(isset($_POST['btn-login']))
{
	$email = $con->real_escape_string(trim($_POST['user_email']));
	$upass = $con->real_escape_string(trim($_POST['password']));
	
	$query = $con->query("SELECT user_id, user_email, user_pass FROM users WHERE user_email='$email'");
	$row=$query->fetch_array();
	
	if(password_verify($upass, $row['user_pass']))
	{
		$_SESSION['userSession'] = $row['user_id'];
		header("Location: account.php");
	}
	else
	{
		$msg = "<div class='alert alert-danger'>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; email or password does not exists !
				</div>";
	}
	

	
}
?>

<br>

<div class="container">
     
        
       <form class="form-signin" method="post" id="login-form">
      
        <h2 class="form-signin-heading">Sign In.</h2><hr />
        
        <?php
		if(isset($msg)){
			echo $msg;
		}
		?>
        
        <div class="form-group">
        <input type="email" class="form-control" placeholder="Email address" name="user_email" required />
        <span id="check-e"></span>
        </div>
        
        <div class="form-group">
        <input type="password" class="form-control" placeholder="Password" name="password" required />
        </div>
       
     	<hr />
        
        <div class="form-group">
            <button type="submit" class="btn btn-default" name="btn-login" id="btn-login">
    		<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In
			</button> 
            
            <a href="register.php" class="btn btn-default" style="float:right;">Sign UP Here</a>
            
        </div>  
        
      
      </form>

    </div>
    
</div>



    </div>
    
	<?php include_once 'footer.php';?>
