<?php
ob_start();
session_start();
if($_SESSION['name']!='snchousebd')
{
header('location: login.php');
}
?>
<?php include("header.php"); ?>
		   <h2>Change footer Text</h2>
<form action="">
<table class="tabl">
    <tr>
	     <td>Footer Text <br>
		 <input class="medium" type="text" name="footer" value="Copyright©2015,SN Chakraborty"> </td>
	</tr>
	<tr>
		 <td><input type="submit" value="save"></td>
	</tr>
</table>
</form>	
<?php include("footer.php"); ?>				   
		  