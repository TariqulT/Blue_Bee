<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<style>
		a{
			text-decoration: none;
		}
		button{
			background-color: blue;
			width: 100px;
		}
	</style>
</head>
<body style="text-align: center;">
	<h1 style="font-weight: bold;">Product Informations</h1>
	<?php
		$server = "localhost";
		$user = "root";
		$pass = "";
		$db = "shop";

		$con = new mysqli($server,$user,$pass,$db);
		if($con->connect_error){
			die("Connection Failed: ".$con->connect_error);
		}
		$sql = "SELECT * FROM product";
		$data = $con->query($sql);
		if($data!=false && $data->num_rows > 0){
	?>
			<table style="margin: auto;width: 50%;padding-bottom: 50px;" cellpadding="7px">
				<tr>
			        <th style="text-align: left;">Name</th>
			        <th>Description</th>
			        <th>Quantity</th>
			        <th>Price</th>
			        <th>Expire Date</th>
			        <th>Update</th>
			        <th>Delete</th>
				</tr>
				<?php while ($row = $data->fetch_assoc()) { ?>
					<tr>
						<td style="text-align: left;"><?php echo $row['name'] ?></td>
						<td><?php echo $row['description'] ?></td>
						<td><?php echo $row['quantity'] ?></td>
						<td><?php echo $row['price'] ?></td>
						<td><?php echo $row['exp_date'] ?></td>
						<td><a href="update.php?id=<?php echo $row['id']; ?>">edit</a></td>
						<td><a href="delete.php?id=<?php echo $row['id']; ?>">&#10060;</a></td>
					</tr>
				
				<?php } ?>
			</table>
	<?php
		}
	?>
	<button><a href="insert.php" style="color: white;">ADD</a></button>
</body>
</html>