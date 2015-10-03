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
if(!isset($_REQUEST['id']))
{
	header('location:postview.php');
}
else
{
	 $id=$_REQUEST['id'];
	 
	 //To unlink image
	 $statement1=$db->prepare("select * from tbl_post where post_id=?");
	$statement1->execute(array($id));
	$result1=$statement1->fetchAll(PDO::FETCH_ASSOC);
	foreach($result1 as $row1)
		{
			$real_path= "../uploads/".$row1['post_image'];
			unlink($real_path);
		}
	 $statement=$db->prepare("delete from tbl_post where post_id=?");
	 $statement->execute(array($id));
	 //$success_msg2="Category has been successfully Deleted";
	 //echo ""
	 header('location:postview.php');
 }
?>