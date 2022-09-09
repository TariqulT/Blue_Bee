
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<body>
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
		$sql = "SELECT * FROM product WHERE id={$id}";
		$data = $con->query($sql);
		$row = $data->fetch_assoc()
	?>
	<h1 style="font-weight: bold;text-align: center;">Update Details</h1>
	<form action="update_help.php" method="post">
		<table style="margin: auto;">
			<tr hidden>
				<td><label>ID </label></td>
				<td><input type="number" name="id" value="<?php echo $row['id']; ?>" readonly></td>
			</tr>
			<tr>
				<td><label>Product Name </label></td>
				<td><input type="text" name="name" value="<?php echo $row['name']; ?>"></td>
			</tr>
			<tr>
				<td><label>Description</label></td>
				<td><input type="text" name="des" value="<?php echo $row['description']; ?>"></td>
			</tr>
			<tr>
				<td><label>Quantity</label></td>
				<td><input type="number" name="quan" value="<?php echo $row['quantity']; ?>"></td>
			</tr>
			<tr>
				<td><label>Price</label></td>
				<td><input type="number" name="price" value="<?php echo $row['price']; ?>"></td>
			</tr>
			<tr>
				<td><label>Expire Date</label></td>
				<td><input type="date" name="date" value="<?php echo $row['exp_date']; ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="sub" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
