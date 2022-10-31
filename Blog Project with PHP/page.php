<?php include 'inc/header.php';?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<?php
                if(isset($_GET['pageid'])&&$_GET['pageid']!=NULL){
                    $pageid = $_GET['pageid'];
                    $sql = "SELECT * FROM tbl_page WHERE id='$pageid'";
                    $result = $db->select($sql);
                    if(!$result||$result->num_rows<=0){
                        header("Location: 404.php");
                    }
                    $page = $result->fetch_assoc();
                ?>
				<h2><?php echo $page['name'];?></h2>
				<?php echo $page['body'];?>
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