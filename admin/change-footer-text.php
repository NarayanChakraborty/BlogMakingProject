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
		
		if(empty($_POST['footer']))
		{
			throw new Exception("Footer Name can not be empty");
		}
	$footer=$_POST['footer'];
    $statement=$db->prepare("update tbl_footer set description=? where id=1");
    $statement->execute(array($footer));
	$success_msg="Tag has been successfully updated";
	}
	 catch(Exception $e)
	 {
		$error_message=$e->getMessage();
	 }
}

?>

<?php include("header.php"); ?>
		   <h2>Change footer Text</h2>
<form action="" method="POST">
<table class="tabl">
    <tr>
	     <td>Footer Text <br>
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
		 
		 <input class="medium" type="text" name="footer" value="<?php
		 $statement=$db->prepare("select * from tbl_footer where id=1");
		 $statement->execute(array());
		 $result=$statement->fetchAll(PDO::FETCH_ASSOC);
		 foreach($result as $row)
		 {
			 echo $row['description'];
		 }
		 
		 ?>"> </td>
	</tr>
	<tr>
		 <td><input type="submit" value="save" name="form"></td>
	</tr>
</table>
</form>	
<?php include("footer.php"); ?>				   
		  