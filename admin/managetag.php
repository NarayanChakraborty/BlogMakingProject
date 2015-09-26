<?php
ob_start();
session_start();
if($_SESSION['name']!='snchousebd')
{
header('location: login.php');
}
?>
<?php include("header.php"); ?>
		   <h2>Add new Tag</h2>
<form action="">
<table class="tabl">
    <tr>
	     <td>Tag Name<br>
		 <input class="short" type="text"></td>
	</tr>
	<tr>
		 <td><input type="submit" value="save"></td>
	</tr>
</table>
</form>		
<h2>View All tags</h2>
<table class="tabl2" width="100%">
<tr>
    <th width="5%">Serial</th>
	<th width="75%">Tag Name</th>
	<th width="20%">Action</th>
</tr>
<tr>
    <td>1</td>
    <td>Technology</td>
    <td><a href="">Edit</a>&nbsp;|&nbsp;<a onclick='return confirmDelete();' href="">Delete</a></td>
</tr>
<tr>
    <td>2</td>
    <td>Computer</td>
    <td><a href="">Edit</a>&nbsp;|&nbsp;<a onclick='return confirmDelete();' href="">Delete</a></td>
</tr>
<tr>
    <td>3</td>
    <td>Science</td>
    <td><a href="">Edit</a>&nbsp;|&nbsp;<a onclick='return confirmDelete();' href="">Delete</a></td>
</tr>
<tr>
    <td>4</td>
    <td>Sports</td>
    <td><a href="">Edit</a>&nbsp;|&nbsp;<a onclick="return confirmDelete();" href="">Delete</a></td>
</tr>
<tr>
    <td>5</td>
    <td>Bangladesh</td>
    <td><a href="">Edit</a>&nbsp;|&nbsp;<a onclick="return confirmDelete();" href="">Delete</a></td>
</tr>	
<?php include("footer.php"); ?>   
		  
