		</div>
		<div id="sidebar">
		    <div id="search">
				<input type="text" value="Search"> <a href="#"><img src="images/go.gif" alt="" width="26" height="26" /></a>																																																																																																																																																																																																																																																						<div class="inner_copy"><a href="http://www.bestfreetemplates.info/flash.php">free flash templates</a><a href="http://www.beautifullife.info/web-design/15-best-free-website-builders/">best free web builders</a></div>
			</div>
			<div class="list">
				<img src="images/title1.gif" alt="" width="186" height="36" />
			<ul>		
					 <?php
					 include('config.php');
					  $statement=$db->prepare("select * from tbl_category order by cat_name asc");
					 $statement->execute(array());
					 $result=$statement->fetchAll(PDO::FETCH_ASSOC);
					 foreach($result as $row)
					 {
						 ?>
						 <li><a href="#"><?php echo $row['cat_name']; ?></a></li>
						 <?php
					 }
					 ?>
					
			 </ul>
				
				<img src="images/title2.gif" alt="" width="180" height="34" /><br>
				
				<?php
				     $j=0;
					 $statement=$db->prepare("select distinct(post_date) from tbl_post order by post_date desc");
					 $statement->execute(array());
					 $result=$statement->fetchAll(PDO::FETCH_ASSOC);
					 foreach($result as $row)
					 {
						  
						 $ym=substr($row['post_date'],0,7);
						 $arr_date[$j]=$ym;
						 $j++;
					 }
					 $result=array_unique($arr_date);
					 $final_val=implode(",",$result);
					 $final_arr_date=explode(",",$final_val);
					 $final_arr_date_count=count(explode(",",$final_val));
					 
					 
					 ?>  
				
				<ul>
				
				    <?php 
					for($j=0;$j<$final_arr_date_count;$j++)
					 {
						// echo $final_arr_date[$j]."<br>";
						$year=substr($final_arr_date[$j],0,4);
						$month=substr($final_arr_date[$j],5,2);
						if($month=='01') {$post_month='January';}
						if($month=='02') {$post_month='February';}
						if($month=='03') {$post_month='March';}
						if($month=='04') {$post_month='April';}
						if($month=='05') {$post_month='May';}
						if($month=='06') {$post_month='June';}
						if($month=='07') {$post_month='JULY';}
						if($month=='08') {$post_month='August';}
						if($month=='09') {$post_month='September';}
						if($month=='10') {$post_month='October';}
						if($month=='11') {$post_month='November';}
						if($month=='12') {$post_month='December';}
					?>
					
				     <li><a href="archives.php?date=<?php echo $final_arr_date[$j];?>">
						 <?php echo $post_month." ".$year."<br>"; ?>
						 </a>
					</li>
					<?php
				     		}
					?>
				</ul>
			</div>
		</div>
	</div>
	<div id="footer">
		<p>
		   <?php 
		   include('config.php');
		  $statement=$db->prepare("select * from tbl_footer where id=1");
		 $statement->execute(array());
		 $result=$statement->fetchAll(PDO::FETCH_ASSOC);
		 foreach($result as $row)
		 {
			 echo $row['description'];
		 }
		    ?>
		</p>																																																																		<div class="inner_copy"><a href="http://www.greatdirectories.org/offer.html">buy links with high pr</a><a href="http://www.bestfreetemplates.org/">free templates</a></div>
	</div>
</body>
</html>
