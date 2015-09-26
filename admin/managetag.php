<?php
ob_start();
session_start();
if($_SESSION['name']!='snchousebd')
{
header('location: login.php');
}
require_once('../config.php');
?>

<?php
 //form1 to insert data
 if(isset($_POST['form1']))
 {
	 try{
		 if(empty($_POST['tag_name']))
		 {
			 throw new Exception("Tag Name can not be empty");
		 }
				 //SearchSql and PDO
		$statement=$db->prepare("select * from tbl_tag where tag_name=?");
		$statement->execute(array($_POST['tag_name']));
		$total=$statement->rowCount();
		if($total>0)
		{
		  throw new Exception("Tag Name already exists");
		}
		$statement=$db->prepare("insert into tbl_tag(tag_name) values(?)");
		$statement->execute(array($_POST['tag_name']));
		$success_msg="Tag Name has been successfully inserted";

	 }
     catch(Exception $e)
	 {
		$error_message=$e->getMessage();
	 }
	 
 }
 
 
 //Form2 to update data
 
 if(isset($_POST['form2']))
 {
	 try{
		 if(empty($_POST['tag_name']))
		 {
			 throw new Exception("Tag Name can not be empty");
		 }
		 
		 //update query
		 
		 $statement=$db->prepare("update tbl_tag set tag_name=? where tag_id=?");
		 $statement->execute(array($_POST['tag_name'],$_POST['hdn']));
		 
		 $success_msg1="Tag has been successfully updated";
	 }
	 catch(Exception $e)
	 {
		 $error_message1=$e->getMessage();
	 }
 }

 //Delete operation
 if(isset($_REQUEST['id']))
 {
	 $id=$_REQUEST['id'];
	 $statement=$db->prepare("delete from tbl_tag where tag_id=?");
	 $statement->execute(array($id));
	 $success_msg2="Tag has been successfully Deleted";
 }
 
?>

<?php include("header.php"); ?>
<!---Add New Tag---->

 <h2>Add new Tag</h2>
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
<form action="" method="post">
<table class="tabl">
    <tr>
	     <td>Tag Name<br>
		 <input class="short" type="text" name="tag_name"></td>
	</tr>
	<tr>
		 <td><input type="submit" value="save" name="form1"></td>
	</tr>
</table>
</form>		

<!---View All Tag--->

<h2>View All Tags</h2>  
<table class="tabl2" width="100%">
<tr>
    <th width="5%">Serial</th>
	<th width="75%">Tag Name</th>
	<th width="20%">Action</th>
</tr>

<!-------SQL with PDO to fetch all Tags----->
		  <?php
		if(isset($error_message1))
		{
		  echo "<div class='error'>".$error_message1."</div>";
		}
		if(isset($success_msg1))
		{
			echo "<div class='success'>".$success_msg1."</div>";
		}
		if(isset($success_msg2))
		{
			echo "<div class='success'>".$success_msg2."</div>";
		}
		?>
<?php
$i=0;
$statement=$db->prepare("select * from tbl_tag order by tag_name asc");
$statement->execute();
$result=$statement->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $row)
{
 $i++;
 ?>
<tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $row['tag_name'];?></td>
    <td><a id="inline" class="fancybox" href="#inline<?php echo $i; ?>">Edit</a>
	<div id="inline<?php echo $i; ?>" style="width:400px; display:none;overflow:auto;">
		<h3>Edit Data</h3>
		<p>
		 <form action=""method="POST">
		 <input type="hidden" name="hdn" value="<?php echo $row['tag_id']; ?>">
		 <table >
				<tr>
					<td>Tag Name</td>
					<td><input type="text" name="cat_name" value="<?php echo $row['tag_name'];?>"></td>
				</tr>
				<tr>
					<td><input type="submit" name="form2" value="Update"></td>
				</tr>
			</table>
		 </form>
		 </p>
	</div>
	&nbsp;|&nbsp;
	<a onclick='return confirmDelete();' href="managetag.php?id=<?php echo $row['tag_id']; ?>">Delete</a></td>
</tr>  
<?php	
}
?>
</table>	
<?php include("footer.php"); ?>   
		  
