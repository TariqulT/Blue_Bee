<?php include 'inc/header.php';?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<?php 
			// Pagination
			$per_page = 3;
			if(isset($_GET['page'])){
				$page = $_GET['page'];
			}
			else{
				$page = 1;
			}
			$start_from = ($page-1)*$per_page;
			// Pagination

			if(isset($_GET['keyword'])){
				$keyword = $_GET['keyword'];
				$sql    = "SELECT * FROM tbl_post WHERE title LIKE '%$keyword%' OR body LIKE '%$keyword%' OR author LIKE '%$keyword%' LIMIT $start_from, $per_page";
				$result = $db->select($sql);
				if($result){
					while($post = $result->fetch_assoc()){	
			?>
			<div class="samepost clear">
				<h2><a href="post.php?id=<?php echo $post['id'];?>"><?php echo $post['title'];?></a></h2>
				<h4><?php echo $format->formatDate($post['date']);?>, By <a href="#"><?php echo $post['author'];?></a></h4>
				<a href="post.php?id=<?php echo $post['id'];?>"><img src="images/<?php echo $post['image'];?>" alt="post image"/></a>
				<?php echo $format->textShorten($post['body'], 200);?>
				<div class="readmore clear">
					<a href="post.php?id=<?php echo $post['id'];?>">Read More</a>
				</div>
			</div>
			<?php
					}
					// Pagination
					$sql    = "SELECT * FROM tbl_post WHERE title LIKE '%$keyword%' OR body LIKE '%$keyword%' OR author LIKE '%$keyword%'";
					$result = $db->select($sql);
					$num_of_row = $result->num_rows;
					$total_page = ceil($num_of_row/$per_page);
					echo "<span class='pagination'><a href='search.php?page=1&keyword=$keyword'>first page</a>";
					for($i=$page;$i<($page+4)&&$i<=$total_page;$i++){
						echo "<a href='search.php?page=$i&keyword=$keyword'>$i</a>";
					}
					echo "<a href='search.php?page=$total_page&keyword=$keyword'>Last page</a></span>";
					// Pagination
				}
				else{
					echo "No post found";
				}
			}
			else{
				header("Location: 404.php");
			}
			?>
		</div>
		<?php include "inc/sidebar.php";?>
	<?php include "inc/footer.php";?>