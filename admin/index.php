<?php
ob_start();
session_start();
if($_SESSION['name']!='snchousebd')
{
header('location: login.php');
}
?>
<?php include("header.php"); ?>
		   <h2>Admin Panel</h2>
				   <div style="font-weight:bold;font-size:20px;color:#fff;text-align:center;margin-top:50px;">
				        WELCOME TO YOUR BLOG
				   </div>
<?php include("footer.php"); ?>				   
		  