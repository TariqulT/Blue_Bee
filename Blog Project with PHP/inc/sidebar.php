<div class="sidebar clear">
	<div class="samesidebar clear">
		<h2>Categories</h2>
			<ul>
				<?php
				$sql = "SELECT * FROM tbl_category";
				$result = $db->select($sql);
				if($result){
					while($category = $result->fetch_assoc()){
				?>
				<li><a href="posts.php?category=<?php echo $category['id'];?>"><?php echo $category['name'];?></a></li>
				<?php
					}
				}
				else{
					echo "<li>No category created !</li>";
				}
				?>
			</ul>
	</div>
	
	<div class="samesidebar clear">
		<h2>Latest articles</h2>
			<div class="popular clear">
				<?php
				$sql = "SELECT * FROM tbl_post ORDER BY date DESC LIMIT 5";
				$result = $db->select($sql);
				if($result){
					while($post = $result->fetch_assoc()){
				?>
				<h3><a href="post.php?postid=<?php echo $post['id'];?>"><?php echo $post['title'];?></a></h3>
				<a href="post.php?postid=<?php echo $post['id'];?>"><img src="images/<?php echo $post['image'];?>" alt="post image"/></a>
				<?php echo $format->textShorten($post['body'], 120);?>
				<?php
					}
				}
				else{
					echo "No Latest Post Available";
				}
				?>
			</div>
	</div>
	
</div>