<?php include("header.php"); ?>
		   <h2>Add new Category</h2>
<form action="">
<table class="tabl">
    <tr>
	     <td>Category Name<br>
		 <input class="short" type="text" name="cat_name"></td>
	</tr>
	<tr>
		 <td><input type="submit" value="save" name="form1"></td>
	</tr>
</table>
</form>		
<h2>View All Categories</h2>
<table class="tabl2" width="100%">
<tr>
    <th width="5%">Serial</th>
	<th width="75%">Category Name</th>
	<th width="20%">Action</th>
</tr>
<tr>
    <td>1</td>
    <td>Technology</td>
    <td><a id="inline" class="fancybox" href="#inline1">Edit</a>
	<div id="inline1" style="width:400px; display:none;overflow:auto;">
		<h3>Edit Data</h3>
		<p>
		 <form action=""method="POST">
		 <table >
				<tr>
					<td>Category Name</td>
					<td><input type="text" name=" " value="technology"></td>
				</tr>
				<tr>
					<td><input type="submit" value="Update"></td>
				</tr>
			</table>
		 </form>
		 </p>
	</div>
	&nbsp;|&nbsp;
	<a onclick='return confirmDelete();' href="">Delete</a></td>
</tr>
<tr>
    <td>2</td>
    <td>Computer</td>
    <td><a id="inline" class="fancybox" href="#inline1">Edit</a>
	<div id="inline1" style="width:400px; display:none;overflow:auto;">
		<h3>Edit Data</h3>
		<p>
		 <form action=""method="POST">
		 <table >
				<tr>
					<td>Category Name</td>
					<td><input type="text" name=" " value="technology"></td>
				</tr>
				<tr>
					<td><input type="submit" value="Update"></td>
				</tr>
			</table>
		 </form>
		 </p>
	</div>
	&nbsp;|&nbsp;
	<a onclick='return confirmDelete();' href="">Delete</a></td>
</tr>
<tr>
    <td>3</td>
    <td>Science</td>
    <td><a id="inline" class="fancybox" href="#inline1">Edit</a>
	<div id="inline1" style="width:400px; display:none;overflow:auto;">
		<h3>Edit Data</h3>
		<p>
		 <form action=""method="POST">
		 <table >
				<tr>
					<td>Category Name</td>
					<td><input type="text" name=" " value="technology"></td>
				</tr>
				<tr>
					<td><input type="submit" value="Update"></td>
				</tr>
			</table>
		 </form>
		 </p>
	</div>
	&nbsp;|&nbsp;
	<a onclick='return confirmDelete();' href="">Delete</a></td>
</tr>
<tr>
    <td>4</td>
    <td>Sports</td>
    <td><a id="inline" class="fancybox" href="#inline1">Edit</a>
	<div id="inline1" style="width:400px; display:none;overflow:auto;">
		<h3>Edit Data</h3>
		<p>
		 <form action=""method="POST">
		 <table >
				<tr>
					<td>Category Name</td>
					<td><input type="text" name=" " value="technology"></td>
				</tr>
				<tr>
					<td><input type="submit" value="Update"></td>
				</tr>
			</table>
		 </form>
		 </p>
	</div>
	&nbsp;|&nbsp;
	<a onclick='return confirmDelete();' href="">Delete</a></td>
</tr>
<tr>
    <td>5</td>
    <td>Bangladesh</td>
    <td><a id="inline" class="fancybox" href="#inline1">Edit</a>
	<div id="inline1" style="width:400px; display:none;overflow:auto;">
		<h3>Edit Data</h3>
		<p>
		 <form action=""method="POST">
		 <table >
				<tr>
					<td>Category Name</td>
					<td><input type="text" name=" " value="technology"></td>
				</tr>
				<tr>
					<td><input type="submit" value="Update"></td>
				</tr>
			</table>
		 </form>
		 </p>
	</div>
	&nbsp;|&nbsp;
	<a onclick='return confirmDelete();' href="">Delete</a></td>
</tr>	
<?php include("footer.php"); ?>   
		  
