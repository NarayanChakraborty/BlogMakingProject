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
	<!-- Add jQuery library -->
<script type="text/javascript" src="../fancybox/lib/jquery-1.10.1.min.js"></script>

<!-- Add fancyBox -->
<link rel="stylesheet" href="../fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
<script type="text/javascript" src="../fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>

<!-- Optionally add helpers - button, thumbnail and/or media -->
<link rel="stylesheet" href="../fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
<script type="text/javascript" src="../fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
<script type="text/javascript" src="../fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

<link rel="stylesheet" href="../fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
<script type="text/javascript" src="../fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

<!----CKEditor Start---->
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
<!---//CKEditor End----->


<script type="text/javascript">
		$(document).ready(function() {


			$('.fancybox').fancybox();
		});
</script>

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
					    <li><a href="logout.php">Logout</a></li>
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