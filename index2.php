
<?php
if(!isset($_REQUEST['id']))
{
	header('location: index.php');
}
$id=$_REQUEST['id'];
?>


<?php include('header.php'); ?>
                 <?php
        			 include('config.php');
					 $statement=$db->prepare("select * from tbl_post where post_id=?");
					 $statement->execute(array($id));
					 $result=$statement->fetchAll(PDO::FETCH_ASSOC);
					 foreach($result as $row)
					 {
						 ?>		 
					<div class="post">
						<h2><?php echo $row['post_title']; ?></h2>
						<div><span class="date">
										<?php
				$post_date=$row['post_date'];
				$post_day=substr($post_date,8,2);
				$post_month=substr($post_date,5,2);
				$post_year=substr($post_date,0,4);
				
				if($post_month=='01') {$post_month='Jan';}
				if($post_month=='02') {$post_month='Feb';}
			    if($post_month=='03') {$post_month='Mar';}
				if($post_month=='04') {$post_month='Apr';}
				if($post_month=='05') {$post_month='May';}
				if($post_month=='06') {$post_month='Jun';}
				if($post_month=='07') {$post_month='JUL';}
				if($post_month=='08') {$post_month='Aug';}
				if($post_month=='09') {$post_month='Sep';}
				if($post_month=='10') {$post_month='Oct';}
				if($post_month=='11') {$post_month='Nov';}
				if($post_month=='12') {$post_month='Dec';}
				
				echo $post_day." ".$post_month.", ".$post_year; 	
			?>
						
						</span>
						<span class="categories">Tags :
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
				
				</span>
				</div>
						<div class="description">
							<p>
							<a class="fancybox-effects-a" href="uploads/<?php echo $row['post_image'];?>" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit"><img src="uploads/<?php echo $row['post_image'];?>" alt="" width="200" height="130" /></a>
							<?php echo $row['post_description']; ?>
						</div>
						<p></p>
					</div>
			<?php
					 }
				
             ?>				
			
			
			<div id="comments">
				<img src="images/title3.gif" alt="" width="216" height="39" /><br />																																																																																																																																																																																																																																																															<div class="inner_copy"><a href="http://www.bestfreetemplates.org/">free templates</a><a href="http://www.bannermoz.com/">banner templates</a></div>
				<div class="comment">
					<div class="avatar">
						<img src="images/avatar1.jpg" alt="" width="80" height="80" /><br />
						<span>Name User</span><br />
						April 15th
					</div>
					<p>Lorem ipsum dolor sit amet, consectetuer adipi scing elit.Mauris urna urna, varius et, interdum a, tincidunt quis, libero. Aenean sit amturpis. Maecenas hendrerit, massa ac laoreet iaculipede mnisl ullamcorpermassa, cosectetuer feipsum eget pede. Donec nonummy, tellus er sodales enim, in tincidunmauris in odio. </p>
				</div>
				<div class="comment">
					<div class="avatar">
						<img src="images/avatar2.gif" alt="" width="80" height="80" /><br />
						<span>Name User</span><br />
						April 12th
					</div>
					<p>Lorem ipsum dolor sit amet, consectetuer adipi scing elit.Mauris urna urna, varius et, interdum a, tincidunt quis, libero. </p>
				</div>
				<div id="add">
					<img src="images/title4.gif" alt="" width="216" height="47" class="title" /><br />
					<div class="avatar">
						<img src="images/avatar2.gif" alt="" width="80" height="80" /><br />
						<span>Name User</span><br />
						April 12th
					</div>
					<div class="form">
						<form action="#">
							<textarea>Your Message...</textarea><br />
							<input type="text" value="Name" /><br />
							<input type="text" value="E-mail" /><br />
							<input type="text" value="URL (Optional)" /><br />
							<a href="#"><img src="images/button.gif" alt="" width="94" height="27" /></a>
						</form>
					</div>
				</div>
			</div>
			
<?php include('footer.php'); ?>	