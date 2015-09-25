<?php include("header.php"); ?>
		   <h2>Edit Post</h2>
<form action="">
<table class="tabl">
    <tr><td>Title</td></tr>
	<tr><td><input class="long" type="text"name=""value="Retro Photos"></td></tr>
	<tr><td>Description</td></tr>
	<tr><td>
	<textarea name="des" cols="30" rows="5">HI I am Sree Narayan Chakraborty
	HI I am Sree Narayan Chakraborty
	HI I am Sree Narayan Chakraborty
	HI I am Sree Narayan Chakraborty
	HI I am Sree Narayan Chakraborty
	HI I am Sree Narayan Chakraborty
	HI I am Sree Narayan Chakraborty
	HI I am Sree Narayan Chakraborty
	HI I am Sree Narayan Chakraborty
	HI I am Sree Narayan Chakraborty
	HI I am Sree Narayan Chakraborty
	HI I am Sree Narayan Chakraborty
	HI I am Sree Narayan Chakraborty
	HI I am Sree Narayan Chakraborty</textarea>
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
	<tr><td>Image</td></tr>
	<tr><td><input type="file"name=""></td></tr>
	<tr><td><h2>Select a Category</h2></td></tr>
	<tr>
		<td>
			<select name=" ">
			     <option value="">Technology</option>
				 <option value="">Computer</option>
				 <option value="">Science</option>
				 <option Value="">Sports</option>
				 <option value="">Bangladesh</option>
		</td>
	</tr>	
	<tr><td><h2>Select a Tag</h2></td></tr>
	<tr>
		<td>
			     <input type="checkbox" name="">&nbsp;Technology</input><br/>
				 <input type="checkbox" name="">&nbsp;Computer</input><br/>
				 <input type="checkbox" name="">&nbsp;Science</input><br/>
				 <input type="checkbox" name="">&nbsp;Sports</input><br/>
				 <input type="checkbox" name="">&nbsp;Bangladesh</input><br/>
		</td>
	</tr>
	<tr><td><input type="submit" value="Update"></td></tr>
</table>
</form>		
<?php include("footer.php"); ?>   
		  
