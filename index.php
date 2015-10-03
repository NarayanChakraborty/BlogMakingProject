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
				</span><span class="categories">Tags :
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
				
				</span></div>
				<div class="description">
				<img src="uploads/<?php echo $row['post_image'];?>" alt="" width="200" height="130" style="float:left;" />
						<p>
						<?php
						$pices=explode(" ",$row['post_description']);
						$first_page=implode(" ",array_splice($pices,0,100));
						$first_page=$first_page."<b> ..........</b>";
						?>
						<?php
						     echo $first_page;
						?>
						</p>
				</div>
				<p class="comments">Comments - 17   <span>|</span>   <a href="index2.php?id=<?php echo $row['post_id']; ?>">Continue Reading</a></p>
			</div>
						 
						 <?php
					}
              ?>		
			
<?php include('footer.php'); ?>			
			