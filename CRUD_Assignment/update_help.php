<?php
	$server = "localhost";
	$user = "root";
	$pass = "";
	$db = "shop";

	$con = new mysqli($server,$user,$pass,$db);
	if($con->connect_error){
		die("Connection Failed: ".$con->connect_error);
	}
	if(empty($_POST['name'])||empty($_POST['quan'])||empty($_POST['price'])||empty($_POST['date'])){
		$con->close();
		header("Location: http://localhost/php/assignment/insert.php");
	}
	$id = $_POST['id'];
	$name = $_POST['name'];
	$des = $_POST['des'];
	$quan = $_POST['quan'];
	$price = $_POST['price'];
	$date = $_POST['date'];
	$sql = "UPDATE product SET name='{$name}', description='{$des}', quantity='{$quan}', price='{$price}', 
	exp_date='{$date}' WHERE id='{$id}';";
	$con->query($sql);
	$con->close();
	header("Location: http://localhost/php/assignment/index.php");
?>