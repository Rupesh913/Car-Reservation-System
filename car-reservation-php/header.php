<?php
session_start();
include 'db_connect.php';


if(isset($_SESSION['userSession']))
{

$query = $con->query("SELECT * FROM users WHERE user_id=".$_SESSION['userSession']);
$userRow=$query->fetch_array();
}

if(isset($_SESSION['adminSession']))
{

$query = $con->query("SELECT * FROM admin WHERE admin_id=".$_SESSION['adminSession']);
$adminRow=$query->fetch_array();
}
?>



<nav class="navbar navbar-default navbar-fixed-top navbar-dark bg-dark">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
             <li><a href="account.php">My Account</a></li>
             <?php if(isset($_SESSION['adminSession']))  {
              echo "<li><a href=admin.php>Admin Area</a></li>"; } ?>
             <li><a href="book_test_drive.php">Book Test Drive</a></li>
             <li><a href="promotions.php">Check Promotions</a></li>
             <li><a href="contact.php">Need Help? Contact Us</a></li>
          </ul>
 <ul class="nav navbar-nav navbar-right">
 <?php if(!isset($_SESSION['userSession']) && !isset($_SESSION['adminSession']))
 {
  echo " li><p class=navbar-text></p></li><li><a href=login.php>Login</a></</li> <li><p class=navbar-text>|</p></li>
        <li><a href=register.php>Register &nbsp;</a></li>
        <li><a href=admin-login.php>Admin Login &nbsp;</a></li>";

      }
      else if(isset($_SESSION['userSession']))  {
        echo "
        <li><a href=#>Welcome <span class=glyphicon glyphicon-user></span>&nbsp;" . $userRow['username']. "</a></li>
            <li><a href=logout.php?logout><span class=glyphicon glyphicon-log-out></span>&nbsp; Logout &nbsp</a></li> " ;
      }

            else if(isset($_SESSION['adminSession']))  {
        echo "
        <li><a href=#><span class=glyphicon glyphicon-user></span>&nbsp;" . $adminRow['admin_username']. "</a></li>
            <li><a href=logout.php?logout><span class=glyphicon glyphicon-log-out></span>&nbsp; Logout &nbsp</a></li> " ;
      }
?>

      </ul>
        </div><!--/.nav-collapse -->
    </nav>
