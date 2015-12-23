<?php
ob_start();
session_start();
if($_SESSION['name']!='snchousebd')
{
header('location: login.php');
}
include('../config.php');
?>

<?php
if(isset($_POST['form']))
{
	try{
		
		if(empty($_POST['prev_password']))
		{
			throw new Exception("Previous Password can not be empty");
		}
		if(empty($_POST['new_password']))
		{
			throw new Exception("New Password can not be empty");
		}
		if(empty($_POST['cnew_password']))
		{
			throw new Exception("Confirm New Password can not be empty");
		}
		if(!(preg_match("/^[a-z0-9_-]{6,40}$/i", $_POST['new_password'])))
		{
		  throw new Exception("<div class='error'>Your Passord length must be atleast of 6 characters<br></div>");
		}
		if($_POST['new_password']!=$_POST['cnew_password'])
		{
			throw new Exception("New Password and Confirm New Password Does not Match");
		}
		$statement=$db->prepare("Select * from tbl_login where id=1");
		$statement->execute();
		$result=$statement->fetchAll(PDO::FETCH_ASSOC);
		foreach($result as $row)
		{
			if((md5($_POST['prev_password']))!=$row['password'])
			{
				throw new Exception("Old Password Does not Match");
			}
		}
		
		$password=md5($_POST['new_password']);

		$statement=$db->prepare("update tbl_login set password=? where id=1");
		$statement->execute(array($password));
		$success_msg="Password has been successfully updated";
	}
	 catch(Exception $e)
	 {
		$error_message=$e->getMessage();
	 }
}

?>

<?php include("header.php"); ?>
		   <h2>Change Password</h2>
	<?php
		if(isset($error_message))
		{
		  echo "<div class='error'>".$error_message."</div>";
		}
		if(isset($success_msg))
		{
			echo "<div class='success'>".$success_msg."</div>";
		}
	?>	
<form action="" method="POST">
<table class="tabl">
    <tr>
	     <td>Enter Previous Password <br></td>
	</tr>
	<tr>
		 <td><input type="password" value="" name="prev_password"></td>
	</tr>
	<tr>
	     <td>Enter New Password <br></td>
	</tr>
	<tr>
		 <td><input type="password" value="" name="new_password"></td>
	</tr> 
	<tr>
	     <td>Confirm New Password <br></td>
	</tr>
	<tr>
		 <td><input type="password" value="" name="cnew_password"></td>
	</tr>
    
	<tr>
		 <td><input type="submit" value="Save" name="form"></td>
	</tr>
	
    	
</table>
</form>	
<?php include("footer.php"); ?>				   
		  