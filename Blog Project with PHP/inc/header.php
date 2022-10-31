<?php include 'config/config.php';?>
<?php include 'lib/Database.php';?>
<?php include 'helpers/Format.php';?>
<?php
	$db     = new Database();
	$format = new Format();
?>
<!DOCTYPE html>
<html>
<head>
	<?php
	if(isset($_GET['pageid'])&&$_GET['pageid']!=NULL){
	    $pageid = $_GET['pageid'];
	    $sql = "SELECT * FROM tbl_page WHERE id='$pageid'";
	    $result = $db->select($sql);
	    if($result){
	        $page = $result->fetch_assoc();
	?>
	<title><?php echo $page['name'].'-'.TITLE;?></title>
	<?php
		}
	}
	elseif(isset($_GET['id'])&&$_GET['id']!=NULL){
		$id = $_GET['id'];
	    $sql = "SELECT * FROM tbl_post WHERE id='$id'";
	    $result = $db->select($sql);
	    if($result){
	        $post = $result->fetch_assoc();
	?>
	<title><?php echo $post['title'].'-'.TITLE;?></title>
	<?php
	    }
	}
	else{
	?>
	<title><?php echo $format->title().'-'.TITLE;?></title>
	<?php
	}
	?>
	<meta name="language" content="English">
	<meta name="description" content="It is a website about education">
	<?php
	if(isset($_GET['postid'])&&$_GET['postid']!=NULL){
	    $postid = $_GET['postid'];
	    $sql = "SELECT * FROM tbl_post WHERE id='$postid'";
	    $result = $db->select($sql);
	    if($result){
	        $post = $result->fetch_assoc();
	?>
	<meta name="keywords" content="<?php echo $post['tags'];?>">
	<?php
		}
	}
	else{
	?>
	<meta name="keywords" content="<?php echo KEYWORD;?>">
	<?php 
	}
	?>
	<meta name="author" content="Delowar">
	<link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.css">	
	<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="style.css">
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/jquery.nivo.slider.js" type="text/javascript"></script>

<script type="text/javascript">
$(window).load(function() {
	$('#slider').nivoSlider({
		effect:'random',
		slices:10,
		animSpeed:500,
		pauseTime:5000,
		startSlide:0, //Set starting Slide (0 index)
		directionNav:false,
		directionNavHide:false, //Only show on hover
		controlNav:false, //1,2,3...
		controlNavThumbs:false, //Use thumbnails for Control Nav
		pauseOnHover:true, //Stop animation while hovering
		manualAdvance:false, //Force manual transitions
		captionOpacity:0.8, //Universal caption opacity
		beforeChange: function(){},
		afterChange: function(){},
		slideshowEnd: function(){} //Triggers after all slides have been shown
	});
});
</script>
</head>

<body>
	<div class="headersection templete clear">
		<a href="index.php">
			<div class="logo">
				<img src="images/logo.png" alt="Logo"/>
				<h2>Website Title</h2>
				<p>Our website description</p>
			</div>
		</a>
		<div class="social clear">
			<div class="icon clear">
				<?php 
                $sql = "SELECT * FROM tbl_social WHERE id=1";
                $result = $db->select($sql);
                if($result){
                    $social = $result->fetch_assoc();
                ?>
				<a href="<?php echo $social['facebook'];?>" target="_blank"><i class="fa fa-facebook"></i></a>
				<a href="<?php echo $social['twitter'];?>" target="_blank"><i class="fa fa-twitter"></i></a>
				<a href="<?php echo $social['linkedin'];?>" target="_blank"><i class="fa fa-linkedin"></i></a>
				<a href="<?php echo $social['google'];?>" target="_blank"><i class="fa fa-google-plus"></i></a>
				<?php 
				}
				?>
			</div>
			<div class="searchbtn clear">
			<form action="search.php" method="get">
				<input type="text" name="keyword" placeholder="Search keyword..." required/>
				<input type="submit" name="submit" value="Search"/>
			</form>
			</div>
		</div>
	</div>
<div class="navsection templete">
	<?php 
		$path = $_SERVER['SCRIPT_FILENAME'];
		$currentpage = basename($path, '.php');
	?>
	<ul>
		<li><a 
			<?php
			if($currentpage=='index'){
				echo "id='active'";
			}
			?>
			href="index.php">Home</a></li>
		<?php 
        $sql = "SELECT * FROM tbl_page";
        $result = $db->select($sql);
        if($result){
            while($page = $result->fetch_assoc()){
        ?>
		<li><a 
			<?php 
	        if(isset($_GET['pageid'])&&$_GET['pageid']==$page['id']){
	        	echo "id='active'";
	        }
	        ?>
			href="page.php?pageid=<?php echo $page['id'];?>"><?php echo $page['name'];?></a></li>	
		<?php
			}
		}
		?>
		<li><a  
			<?php
			if($currentpage=='contact'){
				echo "id='active'";
			}
			?>
			href="contact.php">Contact</a></li>
	</ul>
</div>