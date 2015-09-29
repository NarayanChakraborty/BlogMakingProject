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
if(!isset($_REQUEST['id']))
{
	header('location:postview.php');
}
else
{
	$id=$_REQUEST['id'];
	$statement=$db->prepare("select * from tbl_post where post_id=?");
	$statement->execute(array($id));
	$result=$statement->fetchAll(PDO::FETCH_ASSOC);
	foreach($result as $row)
	{
		$post_title=$row['post_title'];
		$post_description=$row['post_description'];
		$post_image=$row['post_image'];
		$cat_id=$row['cat_id'];
		$tag_id=$row['tag_id'];
	}
}
?>

<?php include("header.php"); ?>
		   <h2>Edit Post</h2>
<form action="">
<table class="tabl">
    <tr><td>Title</td></tr>
	<tr><td><input class="long" type="text"name="post_title"value="<?php echo $post_title;?>"></td></tr>
	<tr><td>Description</td></tr>
	<tr><td>
	<textarea name="des" cols="30" rows="5">
	<?php echo $post_description; ?>
	</textarea>
	<script type="text/javascript">
	if ( typeof CKEDITOR == 'undefined' )
	{
		document.write(
			'<strong><span style="color: #ff0000">Error</span>: CKEditor not found</strong>.' +
			'This sample assumes that CKEditor (not included with CKFinder) is installed in' +
			'the "/ckeditor/" path. If you have it installed in a different place, just edit' +
			'this file, changing the wrong paths in the &lt;head&gt; (line 5) and the "BasePath"' +
			'value (line 32).' ) ;
	}
	else
	{
		var editor = CKEDITOR.replace( 'des' );
		//editor.setData( '<p>Just click the <b>Image</b> or <b>Link</b> button, and then <b>&quot;Browse Server&quot;</b>.</p>' );
	}

</script>
	</td></tr>
	<tr><td>Previous FeaturedImage Preview</td></tr>
	<tr><td><img src="../uploads/<?php echo $post_image; ?>" alt="" width="300px" height="250px"></td></tr>
	<tr><td>New FeaturedImage</td></tr>
	<tr><td><input type="file" name="post_image"></td></tr>
	<tr><td><h2>Select a Category</h2></td></tr>
	<tr>
		<td>
			<select name="cat_id">
			     <option value="">Select a Category</option>
               	
                 <?php
				 $statement=$db->prepare("select * from tbl_category order by cat_name asc");
				 $statement->execute();
				 $result=$statement->fetchAll(PDO::FETCH_ASSOC);
				 foreach($result as $row)
				 {
					 if($row['cat_id']==$cat_id)
					 {
						?><option value="<?php echo $row['cat_id'];?>" selected><?php echo $row['cat_name'];?></option><?php	 
					 }
					 else
					 {
						 ?><option value="<?php echo $row['cat_id'];?>"><?php echo $row['cat_name'];?></option><?php	
					 }
				 }
				 
				 ?>
			</select>	 
		</td>
	</tr>	
	<tr><td><h2>Select a Tag</h2></td></tr>
	<tr>
		<td>
		     
                <?php
                $statement=$db->prepare("select * from tbl_tag order by tag_name asc");				
		        $statement->execute();
				$result=$statement->fetchAll(PDO::FETCH_ASSOC);
				foreach($result as $row)
				{
				 $j=0;	
				 $tagarr=explode(",",$tag_id);
				 $tagcount=count(explode(",",$tag_id));
				 $ismatch=0;
				 for(;$j<$tagcount;$j++)
				 {
					 if($tagarr[$j]==$row['tag_id'])
					 {
						 $ismatch=1;
						 break;
					 }
				 }
					if($ismatch==1)
						{
							?><input type="checkbox" name="tag_id[]" value="<?php echo $row['tag_id'];?>" checked><?php echo $row['tag_name']; ?></input><br/><?php
						}
						else
						?><input type="checkbox" name="tag_id[]" value="<?php echo $row['tag_id'];?>"><?php echo $row['tag_name']; ?></input><br/><?php
				}
				?>
		</td>
	</tr>
	<tr><td><input type="submit" value="Update"></td></tr>
</table>
</form>		
<?php include("footer.php"); ?>   
		  
