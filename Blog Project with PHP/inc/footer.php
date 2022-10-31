	</div>

	<div class="footersection templete clear">
	  <div class="footermenu clear">
		<ul>
			<li><a href="#">Home</a></li>
			<li><a href="#">About</a></li>
			<li><a href="#">Contact</a></li>
			<li><a href="#">Privacy</a></li>
		</ul>
	  </div>
	  	<?php 
	    $sql = "SELECT * FROM tbl_footer WHERE id=1";
	    $result = $db->select($sql);
	    if($result){
	        $row = $result->fetch_assoc();
	    ?>
	  	<p>&copy; <?php echo $row['data'];?> <?php echo date('Y');?></p>
	  	<?php 
	  	}
	  	?>
	</div>
	<div class="fixedicon clear">
		<?php 
        $sql = "SELECT * FROM tbl_social WHERE id=1";
        $result = $db->select($sql);
        if($result){
            $social = $result->fetch_assoc();
        ?>
		<a href="<?php echo $social['facebook'];?>" target="_blank"><img src="images/fb.png" alt="Facebook"/></a>
		<a href="<?php echo $social['twitter'];?>" target="_blank"><img src="images/tw.png" alt="Twitter"/></a>
		<a href="<?php echo $social['linkedin'];?>" target="_blank"><img src="images/in.png" alt="LinkedIn"/></a>
		<a href="<?php echo $social['google'];?>" target="_blank"><img src="images/gl.png" alt="GooglePlus"/></a>
		<?php 
		}
		?>
	</div>
<script type="text/javascript" src="js/scrolltop.js"></script>
</body>
</html>