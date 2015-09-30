<?php
ob_start();
session_start();
if($_SESSION['name']!='snchousebd')
{
header('location: login.php');
}
include('../config.php');
?>
<?php include("header.php"); ?>
<h2>View All tags</h2>
<table class="tabl2" width="100%">
<tr>
    <th width="5%">Serial</th>
	<th width="70%">Tttle</th>
	<th width="25%">Action</th>
</tr>


<?php
$i=0;
$statement=$db->prepare("select * from tbl_post order by post_id desc");
$statement->execute();
$result=$statement->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $row)
{ $i++;
	?>
	
		<tr>
			<td><?php echo $i;?></td>
			<td><?php echo $row['post_title'];?></td>
			<td><a id="inline" class="fancybox" href="#inline<?php echo $i;?>">View</a>
			<div id="inline<?php echo $i;?>" style="width:550px; display:none;overflow:auto;">
				<h3 style="background-color:#3d9ccd;color:#fff;">View Data</h3>
				<p>
				 <form action=""method="POST">
				 <table style="border:1px solid #3d9ccd;">
				    <tr><td><b>Post Title</b></td></tr>
					<tr>
						<td><?php echo $row['post_title'];?></td>
					</tr>
					<tr>
						<td><b>Description</b></td>
					</tr>
					<tr>
						<td>
						<?php echo $row['post_description'];?>
							<br>
						</td>
					</tr>
					<tr>
						<td><b>Featured Image</b></td>
					</tr>
					<tr>
							<td><img src="../uploads/<?php echo $row['post_image'];?>" alt="" width="200px" height="180px"></td>
					</tr>
					<tr>
						<td><b>Category</b></td>
					</tr>
					<tr>
						<td>
						<?php
						$statement1=$db->prepare("select * from tbl_category where cat_id=?");
						$statement1->execute(array($row['cat_id']));
						$result1=$statement1->fetchAll(PDO::FETCH_ASSOC);
						foreach($result1 as $row1)
						{
							echo $row1['cat_name'];
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
								$arr=explode(',',$row['tag_id']);
								$arr_count=count(explode(',',$row['tag_id']));
								$k=0;
								for($j=0;$j<$arr_count;$j++)
								{
									 $statement1=$db->prepare("select * from tbl_tag where tag_id=?");
									 $statement1->execute(array($arr[$j]));
									 $result1=$statement1->fetchAll(PDO::FETCH_ASSOC);
									 foreach($result1 as $row1)
									 {
										$arr1[$k]=$row1['tag_name'];  
									 }
								   $k++;
                                }
								$tag_names=implode(",",$arr1);
								echo $tag_names;
                              ?>							 
						</td>
					</tr>
				 </table>
				 </form>
				 </p>
			</div>
			&nbsp;|&nbsp;<a href="postedit.php?id=<?php echo $row['post_id'];?>">Edit</a>&nbsp;|&nbsp;<a onclick='return confirmDelete();' href="">Delete</a></td>
		</tr>
			
	
	
  <?php	
}
?>

<?php include("footer.php"); ?>   