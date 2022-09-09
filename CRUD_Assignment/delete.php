<?php
	$id = $_GET['id'];
	$server = "localhost";
	$user = "root";
	$pass = "";
	$db = "shop";

	$con = new mysqli($server,$user,$pass,$db);
	if($con->connect_error){
		die("Connection Failed: ".$con->connect_error);
	}
	$sql = "DELETE FROM product WHERE id='{$id}'";
	$con->query($sql);
	$sql = "UPDATE product SET id=id-1 WHERE id>'{$id}'";
	$con->query($sql);
	$con->close();
	header("Location: http://localhost/php/assignment/index.php");
?>