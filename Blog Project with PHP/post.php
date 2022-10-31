<?php include 'inc/header.php';?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<?php
					if(isset($_GET['postid']) && $_GET['postid']!=NULL){
						$id     = $_GET['postid'];
						$sql    = "SELECT * FROM tbl_post WHERE id=$postid";
						$result = $db->select($sql);
						if(!$result){
							header("Location: 404.php");
						}
						$post   = $result->fetch_assoc();
				?>
				<h2><?php echo $post['title'];?></h2>
				<h4><?php echo $format->formatDate($post['date']);?>, By <?php echo $post['author'];?></h4>
				<img src="images/<?php echo $post['image'];?>" alt="MyImage"/>
				<?php echo $post['body'];?>

				<div class="relatedpost clear">
					<h2>Related articles</h2>
					<?php
						$catid = $post['cat'];
						$sql = "SELECT * FROM tbl_post WHERE cat=$catid and id!=$id limit 3";
						$result = $db->select($sql);
						if($result&&$result->num_rows>0){
							while($post = $result->fetch_assoc()){
					?>
					<a href="post.php?id=<?php echo $post['id'];?>"><img src="images/<?php echo $post['image'];?>" alt="post image"/></a>
					<?php
							}
						}
						else{
							echo "<p>No Realated Post Available</p>";
						}
					?>
				</div>
				<?php
					}
					else{
						header("Location: 404.php");
					}
				?>
			</div>
		</div>
		<?php include "inc/sidebar.php";?>
	<?php include "inc/footer.php";?>