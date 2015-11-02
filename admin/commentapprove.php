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
	
	<!---fancy box to show comment--->
	
	<td><a id="inline" class="fancybox" href="#inline<?php echo $i;?>">Show</a>
	
	<div id="inline<?php echo $i;?>" style="width:400px; display:none;overflow:auto;padding:10px;">
				<h3 style="background-color:#3d9ccd;color:#fff;">View Comment</h3>
				<p>
				 
                   <?php
					echo "<br>";
					echo $row['c_message'];
                   ?>				
 				 </p>
			</div>
	
	
	</td>
	
	<!---fancy box to show post--->
	
	<td><a id="inline" class="fancybox" href="#inline<?php echo $i.$i;?>"><?php echo $row['post_id'];?></a>
	
	<div id="inline<?php echo $i.$i;?>" style="width:550px; display:none;overflow:auto;">
				<h3 style="background-color:#3d9ccd;color:#fff;">View Data</h3>
				<p>
				
				<?php
				$statement1=$db->prepare("select * from tbl_post where post_id=?");
				$statement1->execute(array($row['post_id']));
				$result=$statement1->fetchAll(PDO::FETCH_ASSOC);
				foreach($result as $row1)
				{
					?>
				 <table style="border:1px solid #3d9ccd;">
				    <tr><td><b>Post Title</b></td></tr>
					<tr>
						<td><?php echo $row1['post_title'];?></td>
					</tr>
					<tr>
						<td><b>Description</b></td>
					</tr>
					<tr>
						<td>
						<?php echo $row1['post_description'];?>
							<br>
						</td>
					</tr>
					<tr>
						<td><b>Featured Image</b></td>
					</tr>
					<tr>
							<td><img src="../uploads/<?php echo $row1['post_image'];?>" alt="" width="200px" height="180px"></td>
					</tr>
					<tr>
						<td><b>Category</b></td>
					</tr>
					<tr>
						<td>
						<?php
						$statement2=$db->prepare("select * from tbl_category where cat_id=?");
						$statement2->execute(array($row1['cat_id']));
						$result1=$statement2->fetchAll(PDO::FETCH_ASSOC);
						foreach($result1 as $row2)
						{
							echo $row2['cat_name'];
						}
						
						?>
						</td>
					</tr>
					<tr>
						<td><b>Tag</b></td>
					</tr>
					<tr>
						<td>
                             <?php
								//when retrive data (using explode)
								$arr=explode(',',$row1['tag_id']);
								$arr_count=count(explode(',',$row1['tag_id']));
								$k=0;
								for($j=0;$j<$arr_count;$j++)
								{
									 $statement2=$db->prepare("select * from tbl_tag where tag_id=?");
									 $statement2->execute(array($arr[$j]));
									 $result1=$statement2->fetchAll(PDO::FETCH_ASSOC);
									 foreach($result1 as $row2)
									 {
										$arr1[$k]=$row2['tag_name'];  
									 }
								   $k++;
                                }
								$tag_names=implode(",",$arr1);
								echo $tag_names;
                              ?>							 
						</td>
					</tr>
				 </table>

					
					<?php
				}
				?>
				
	
				 </p>
			</div>
	
	
	
	
	</td>
	
	
	
	
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
	
	<!---fancy box to show comment--->
	<td><a id="inline" class="fancybox" href="#inline<?php echo $i;?>">Show</a>
	
	<div id="inline<?php echo $i;?>" style="width:400px; display:none;overflow:auto;padding:10px;">
				<h3 style="background-color:#3d9ccd;color:#fff;">View Comment</h3>
				<p>
				 
                   <?php
					echo "<br>";
					echo $row['c_message'];
                   ?>				
 				 </p>
			</div>
	
	
	</td>
	
	
	
	
	<!---fancy box to show post--->
	<td><a id="inline" class="fancybox" href="#inline<?php echo $i.$i?>"><?php echo $row['post_id'];?></a>
	
	<div id="inline<?php echo $i.$i?>" style="width:550px; display:none;overflow:auto;">
				<h3 style="background-color:#3d9ccd;color:#fff;">View Data</h3>
				<p>
				
				<?php
				$statement1=$db->prepare("select * from tbl_post where post_id=?");
				$statement1->execute(array($row['post_id']));
				$result=$statement1->fetchAll(PDO::FETCH_ASSOC);
				foreach($result as $row1)
				{
					?>
				 <table style="border:1px solid #3d9ccd;">
				    <tr><td><b>Post Title</b></td></tr>
					<tr>
						<td><?php echo $row1['post_title'];?></td>
					</tr>
					<tr>
						<td><b>Description</b></td>
					</tr>
					<tr>
						<td>
						<?php echo $row1['post_description'];?>
							<br>
						</td>
					</tr>
					<tr>
						<td><b>Featured Image</b></td>
					</tr>
					<tr>
							<td><img src="../uploads/<?php echo $row1['post_image'];?>" alt="" width="200px" height="180px"></td>
					</tr>
					<tr>
						<td><b>Category</b></td>
					</tr>
					<tr>
						<td>
						<?php
						$statement2=$db->prepare("select * from tbl_category where cat_id=?");
						$statement2->execute(array($row1['cat_id']));
						$result1=$statement2->fetchAll(PDO::FETCH_ASSOC);
						foreach($result1 as $row2)
						{
							echo $row2['cat_name'];
						}
						
						?>
						</td>
					</tr>
					<tr>
						<td><b>Tag</b></td>
					</tr>
					<tr>
						<td>
                             <?php
								//when retrive data (using explode)
								$arr=explode(',',$row1['tag_id']);
								$arr_count=count(explode(',',$row1['tag_id']));
								$k=0;
								for($j=0;$j<$arr_count;$j++)
								{
									 $statement2=$db->prepare("select * from tbl_tag where tag_id=?");
									 $statement2->execute(array($arr[$j]));
									 $result1=$statement2->fetchAll(PDO::FETCH_ASSOC);
									 foreach($result1 as $row2)
									 {
										$arr1[$k]=$row2['tag_name'];  
									 }
								   $k++;
                                }
								$tag_names=implode(",",$arr1);
								echo $tag_names;
                              ?>							 
						</td>
					</tr>
				 </table>

					
					<?php
				}
				?>
				
	
				 </p>
			</div>
	
	
	
	
	</td>
	
	
</tr>  
<?php	
}
?>
</table>	
		   
<?php include("footer.php"); ?>
		  