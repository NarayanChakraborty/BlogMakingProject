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

if(isset($_POST['form1']))
{
	try{
		if(empty($_POST['post_title']))
		{
			throw new Exception("Title can not be empty");
		}
		if(empty($_POST['post_description']))
		{
			throw new Exception("Title can not be empty");
		}
	    if(empty($_POST['cat_id']))
		{
			throw new Exception("Category can not be empty");
		}
		if(empty($_POST['tag_id']))
		{
			throw new Exception("Tag Name can not be empty");
		}
 	
           //echo $_POST['post_title']."<br>";
		   //echo $_POST['post_description']."<br>";
           //echo $_POST['cat_id']."<br>";
		   //echo $_POST['tag_id']."<br>";
		   
		   $tag_id=$_POST['tag_id'];
		   $i=0;
		   
		    if(is_array($tag_id))
			{
			   foreach($tag_id as $key=>$val)
			   {
				   $arr[$i]=$val;
				   echo $arr[$i]."<br>";
				   $i++;			   
			   }
		   }
		   //post date
		   $post_date= date('Y-m-d');
		   
		   
		   //post time
		   $post_timestamp=strtotime(date('Y-m-d'));
		   
		   
		   //echo $post_date."<br>";
		   //echo $post_timestamp."<br>";
		   
		   
		   
	 $success_message="Post is inserted succesfully";
	
	
	
	}
	
	catch(Exception $e)
	{
		$error_message=$e->getMessage();
	}
}



?>

<?php include("header.php"); ?>
<!---Add New Post---->


<h2>Add new Post</h2>
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
    <tr><td><b>Title<b></td></tr>
	<tr><td><input class="long" type="text"name="post_title"></td></tr>
	<tr><td><b>Description</b></td></tr>
	<tr>
		<td>
			<textarea name="post_description" cols="30" rows="5"></textarea>
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
					var editor = CKEDITOR.replace( 'post_description' );
					//editor.setData( '<p>Just click the <b>Image</b> or <b>Link</b> button, and then <b>&quot;Browse Server&quot;</b>.</p>' );
				}

			</script>
		</td>
	</tr>
	<tr><td><b>FeaturedImage</b></td></tr>
	<tr><td><input type="file"name="post_image"></td></tr>
	<tr><td><b>Select a Category</b></td></tr>
	<tr>
		<td>
			<select name="cat_id">
			<option value="">Select a category</option>
			<?php
			//To fetch all category from tbl_category Table
			$statement=$db->prepare("select * from tbl_category order by cat_name asc") ;
			$statement->execute();
            $result=$statement->fetchAll(PDO::FETCH_ASSOC);
			foreach($result as $row)
			{
				?>
			   <option value="<?php echo $row['cat_id'];?>"><?php echo $row['cat_name'];?></option>	
			<?php
			}
			 ?>
			 
		</td>
	</tr>	
	<tr><td><b>Select a Tag</b></td></tr>
	<tr>
	     <td>
			 <?php
					//To fetch all Tag from tbl_tag Table
					$statement=$db->prepare("select * from tbl_tag order by tag_name asc") ;
					$statement->execute();
					$result=$statement->fetchAll(PDO::FETCH_ASSOC);
					foreach($result as $row)
					{
			        ?>	
		          <input type="checkbox" name="tag_id[]"value="<?php echo $row['tag_id']; ?>">&nbsp;<?php echo $row['tag_name'];?></input><br/>	
  				  
	        	<?php
					}
			?>	
         </td>
	</tr>
	<tr><td><input type="submit" value="Save" name="form1"></td></tr>
</table>
</form>		
<?php include("footer.php"); ?>   