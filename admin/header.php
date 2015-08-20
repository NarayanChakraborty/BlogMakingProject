<!doctype html>
<html lang="en">
<head>
     <meta charset="UTF-8">
	 <title>Dashbord-simple Blog with PHP</title>
	 <link rel="stylesheet" href="../styleadmin.css">
	 <script type='text/javascript'>
	 function confirmDelete()
	 {
	    return confirm("Do you sure want to delete this data?");
	 }
	 </script>
	 </script>
	<!-- Fancybox jQuery -->
	<script type="text/javascript" src="../fancybox/jquery-1.9.0.min.js"></script>
	<script type="text/javascript" src="../fancybox/jquery.fancybox.js"></script>
	<script type="text/javascript" src="../fancybox/main.js"></script>
	<link rel="stylesheet" type="text/css" href="../fancybox/jquery.fancybox.css" />
	<!-- //Fancybox jQuery -->
	
	<!-- CKEditor Start -->
	<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
	<!-- // CKEditor End -->
</head>
<body>
<div id="wrapper">
   <div id="header">
   <h1>Admin Panel Dashbord</h1>
   </div>
    <div id="container">
          <div id="sidebar">
		      <h2>Page Options</h2>
			      <ul>
				       <li><a href="index.php">Home</a></li>
					    <li><a href="change-footer-text.php">Footer Text change</a></li>
					    <li><a href="">Logout</a></li>
				  </ul>
				  <h2>Blog Options</h2>
			      <ul>
				       <li><a href="postadd.php">Add Post</a></li>
					    <li><a href="postview.php">View Post</a></li>
					    <li><a href="managecategory.php">Manage Category</a></li>
						<li><a href="managetag.php">Manage Tags</a></li>
				  </ul>
		  </div>
           <div id="content">