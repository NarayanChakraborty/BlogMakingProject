<?php
if(!isset($_REQUEST['date']))
{
	header('location: index.php');

}
else{
$date=$_REQUEST['date'];
$year1=substr($date,0,4);
$month1=substr($date,5,2);
}
?>
<?php include('header.php'); ?>
		
<?php
			 include('config.php');
			 
			 /* ===================== Pagination Code Starts ================== */
			$adjacents = 7;
										
					
			
			
			$statement = $db->prepare("SELECT * FROM tbl_post where month=? and year=? ORDER BY post_id DESC");
			$statement->execute(array($month1,$year1));
			$total_pages = $statement->rowCount();
			if($total_pages==0)
			{
			    ?>
			          <h1 style="text-align:center;">No Post Found</h1>
				  <?php	
			}
			$targetpage = $_SERVER['PHP_SELF'];   //your file name  (the name of this file)
			$limit =4;                                 //how many items to show per page
			$page = @$_GET['page'];
			if($page) 
				$start = ($page - 1) * $limit;          //first item to display on this page
			else
				$start = 0;
			
						
			$statement = $db->prepare("SELECT * FROM tbl_post where month=? and year=?  ORDER BY  post_id DESC LIMIT $start, $limit");
			$statement->execute(array($month1,$year1));
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			
			
			if ($page == 0) $page = 1;                  //if no page var is given, default to 1.
			$prev = $page - 1;                          //previous page is page - 1
			$next = $page + 1;                          //next page is page + 1
			$lastpage = ceil($total_pages/$limit);      //lastpage is = total pages / items per page, rounded up.
			$lpm1 = $lastpage - 1;   
			$pagination = "";
			if($lastpage > 1)
			{   
				$pagination .= "<div class=\"pagination\">";
				if ($page > 1) 
					$pagination.= "<a href=\"$targetpage?date=$date & page=$prev\">&#171; previous</a>";
				else
					$pagination.= "<span class=\"disabled\">&#171; previous</span>";    
				if ($lastpage < 7 + ($adjacents * 2))   //not enough pages to bother breaking it up
				{   
					for ($counter = 1; $counter <= $lastpage; $counter++)
					{
						if ($counter == $page)
							$pagination.= "<span class=\"current\">$counter</span>";
						else
							$pagination.= "<a href=\"$targetpage?date=$date & page=$counter\">$counter</a>";                 
					}
				}
				elseif($lastpage > 5 + ($adjacents * 2))    //enough pages to hide some
				{
					if($page < 1 + ($adjacents * 2))        
					{
						for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
						{
							if ($counter == $page)
								$pagination.= "<span class=\"current\">$counter</span>";
							else
								$pagination.= "<a href=\"$targetpage?date=$date & page=$counter\">$counter</a>";                 
						}
						$pagination.= "...";
						$pagination.= "<a href=\"$targetpage?date=$date & page=$lpm1\">$lpm1</a>";
						$pagination.= "<a href=\"$targetpage?date=$date & page=$lastpage\">$lastpage</a>";       
					}
					elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
					{
						$pagination.= "<a href=\"$targetpage?date=$date & page=1\">1</a>";
						$pagination.= "<a href=\"$targetpage?date=$date & page=2\">2</a>";
						$pagination.= "...";
						for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
						{
							if ($counter == $page)
								$pagination.= "<span class=\"current\">$counter</span>";
							else
								$pagination.= "<a href=\"$targetpage?date=$date & page=$counter\">$counter</a>";                 
						}
						$pagination.= "...";
						$pagination.= "<a href=\"$targetpage?date=$date & page=$lpm1\">$lpm1</a>";
						$pagination.= "<a href=\"$targetpage?date=$date & page=$lastpage\">$lastpage</a>";       
					}
					else
					{
						$pagination.= "<a href=\"$targetpage?date=$date & page=1\">1</a>";
						$pagination.= "<a href=\"$targetpage?date=$date & page=2\">2</a>";
						$pagination.= "...";
						for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
						{
							if ($counter == $page)
								$pagination.= "<span class=\"current\">$counter</span>";
							else
								$pagination.= "<a href=\"$targetpage?date=$date & page=$counter\">$counter</a>";                 
						}
					}
				}
				if ($page < $counter - 1) 
					$pagination.= "<a href=\"$targetpage?date=$date & page=$next\">next &#187;</a>";
				else
					$pagination.= "<span class=\"disabled\">next &#187;</span>";
				$pagination.= "</div>\n";       
			}
			/* ===================== Pagination Code Ends ================== */	
			 
			 
			 /* 
			 $statement=$db->prepare("select * from tbl_post order by post_id desc");
			 $statement->execute(array());
			 $result=$statement->fetchAll(PDO::FETCH_ASSOC);*/
			 
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
				<p class="comments">Comments 
                   
                 <?php
				   $statement1=$db->prepare("select * from tbl_comment where post_id=? and action=1");
                   $statement1->execute(array($row['post_id']));
                   $totalnum=$statement1->rowCount();
                   echo $totalnum;				   
				?>
				 
				<span>|</span>   <a href="index2.php?id=<?php echo $row['post_id']; ?>">Continue Reading</a></p>
			</div>
						 
						 <?php
						 
						 
					}	 
             ?>	
<div class="pagination">			  
<?php echo $pagination;?>	
</div>		
<?php include('footer.php'); ?>			
			