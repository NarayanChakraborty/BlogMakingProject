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
 	    
		//IMAGE MANAGE
		
		if(getimagesize($_FILES['post_image']['tmp_name'])==FALSE)
		 {
		   throw new Exception("<div class='error'>Please select an image</div>"); //access only image
		 }
		 if($_FILES['post_image']['size']>1000000){
		 throw new Exception("<div class='error'>Sorry,your file is too large</div>"); //image file must be<1MB
		 }
		
		
	    //To generate id(next auto increment value from tbl_post)
		$statement=$db->prepare("show table status like 'tbl_post' ");
		$statement->execute();
		$result=$statement->fetchAll();
		foreach($result as $row)
		$new_id=$row[10];
		   
		//access image process one;   
	    $up_filename=$_FILES['post_image']['name'];   //file_name
		$file_basename=substr($up_filename,0,strripos($up_filename,'.'));//orginal image name
		$file_ext=substr($up_filename,strripos($up_filename,'.')); //extension
		$f1=$new_id.$file_ext;  //Rename filename;

	    
		//only allow png ,jpg,jpeg,gif
		if(($file_ext!='.png')&&($file_ext!='.jpg')&&($file_ext!='.jpeg')&&($file_ext!=['.gif']))
		{
			throw new Exception("only jpg,jpeg,png and gif format are allowed");
		}
	     
        //upload image to a folder
        move_uploaded_file($_FILES['post_image']['tmp_name'],"../uploads/".$f1);		
		
		
		/*UPLOAD IMAGE DIRECTLY TO A DATABASE
		 $image_name=addslashes($_FILES['image']['name']);
		 $imageFileType=pathinfo($image_name,PATHINFO_EXTENSION);
		 
		 if($imageFileType!="jpg"&&$imageFileType!="png"&&$imageFileType!="jpeg"&&$imageFileType!="gif")
		 throw new Exception("<div class='error'>File Type must be jpg/png/jpeg/gif</div>");
		 
		 $image=addslashes($_FILES['image']['tmp_name']);
		 $image=file_get_contents($image);
		 $image=base64_encode($image);
		*/
	
          //Multiple tag... access
		   $tag_id=$_POST['tag_id'];
		   $i=0;
		   
		    if(is_array($tag_id))
			{
			   foreach($tag_id as $key=>$val)
			   {
				   $arr[$i]=$val;
				   $i++;			   
			   }
		   }
		   
		   //implode
		   $tag_ids=implode(",",$arr);
		   //echo $tag_ids;
		   
		   
		   //post date
		   $post_date= date('Y-m-d');
		   $year=substr($post_date,0,4);
		   $month=substr($post_date,5,2);
		   $day=substr($post_date,7,2);
		   
		   
		   //post time
		   $post_timestamp=strtotime(date('Y-m-d'));
		   
		   
		   //pdo to insert all above informations.. to tbl_post
		   $statement=$db->prepare("insert into tbl_post(post_title,post_description,post_image,cat_id,tag_id,post_date,month,year,post_timestamp) values(?,?,?,?,?,?,?,?,?)");
		   $statement->execute(array($_POST['post_title'],$_POST['post_description'],$f1,$_POST['cat_id'],$tag_ids,$post_date,$month,$year,$post_timestamp));
		   
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
		if(isset($success_message))
		{
			echo "<div class='success'>".$success_message."</div>";
		}
?>
<form action="" method="POST" enctype="multipart/form-data">
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
	<tr><td><input type="file" name="post_image"></td></tr>
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