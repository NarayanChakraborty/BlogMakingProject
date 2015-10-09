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
if(isset($_REQUEST['id']))
{
	try{

	$id=$_REQUEST['id'];
    $statement=$db->prepare("update tbl_comment set action=1 where c_id=?");
    $statement->execute(array($id));
	$success_msg="Comment is approved,Thank You";
	}
	 catch(Exception $e)
	 {
		$error_msg=$e->getMessage();
	 }
}

?>

<?php include("header.php"); ?>
		   <h2>All Unapproved Comments</h2>
			  <?php
		if(isset($error_msg))
		{
		  echo "<div class='error'>".$error_msg."</div>";
		}
		if(isset($success_msg))
		{
			echo "<div class='success'>".$success_msg."</div>";
		}
		?>	   
		   
<table class="tabl2" width="100%">
<tr>
    <th width="">Serial</th>
	<th width="">Name</th>
	<th width="">Email</th>
	<th width="">Url</th>
	<th width="">Message</th>
	<th width="">Post_id</th>
	<th width="">Action</th>
</tr>

<!-------SQL with PDO to fetch all category----->

<?php
$i=0;
$statement=$db->prepare("select * from tbl_comment where action=0 order by c_id desc");
$statement->execute();
$result=$statement->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $row)
{
 $i++;
 ?>
<tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $row['c_name'];?></td>
    <td><?php echo $row['c_email'];?></td>
	<td><?php echo $row['c_url'];?></td>
	<td><?php echo $row['c_message'];?></td>
	<td><?php echo $row['post_id'];?></td>
	<td><a href="commentapprove.php?id=<?php echo $row['c_id'];?>">Approve</a></td>
</tr>  
<?php	
}
?>
</table>	
		   
		   
		   
		   <h2>All Approved Comments</h2>

		   
<table class="tabl2" width="100%">
<tr>
    <th width="">Serial</th>
	<th width="">Name</th>
	<th width="">Email</th>
	<th width="">Url</th>
	<th width="">Message</th>
	<th width="">Post_id</th>
</tr>

<!-------SQL with PDO to fetch all category----->
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
$statement=$db->prepare("select * from tbl_comment where action=1 order by c_id desc");
$statement->execute();
$result=$statement->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $row)
{
 $i++;
 ?>
<tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $row['c_name'];?></td>
    <td><?php echo $row['c_email'];?></td>
	<td><?php echo $row['c_url'];?></td>
	<td><?php echo $row['c_message'];?></td>
	<td><?php echo $row['post_id'];?></td>
</tr>  
<?php	
}
?>
</table>	
		   
<?php include("footer.php"); ?>				   
		  