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
	$name = $_POST['name'];
	$des = $_POST['des'];
	$quan = $_POST['quan'];
	$price = $_POST['price'];
	$date = $_POST['date'];
	$sql = "INSERT INTO product(id, name, description, quantity, price, exp_date)
	VALUES('', '{$name}', '{$des}', '{$quan}', '{$price}', '{$date}')";
	if ($con->query($sql) === TRUE) {
	  echo "New record created successfully";
	} else {
	  echo "Error: " . $sql . "<br>" . $con->error;
	}
	$con->close();
	header("Location: http://localhost/php/assignment/index.php");
?>