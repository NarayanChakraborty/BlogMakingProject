<?php include('header.php'); ?>
		
		     <?php
					 include('config.php');
					 $statement=$db->prepare("select * from tbl_post order by post_id desc");
					 $statement->execute(array());
					 $result=$statement->fetchAll(PDO::FETCH_ASSOC);
					 foreach($result as $row)
					 {
						 ?>
						 
			    <div class="post">
				<h2><?php echo $row['post_title'];?></h2>
				<div><span class="date">Mar 18th</span><span class="categories">in: Photos, Retro</span></div>
				<div class="description">
				<img src="uploads/<?php echo $row['post_image'];?>" alt="" width="200" height="130" />
						<p>
						<?php
						     echo $row['post_description'];
						?>
						</p>
				</div>
				<p class="comments">Comments - 17   <span>|</span>   <a href="index2.php">Continue Reading</a></p>
			</div>
						 
						 <?php
					}
              ?>		
			
<?php include('footer.php'); ?>			
			