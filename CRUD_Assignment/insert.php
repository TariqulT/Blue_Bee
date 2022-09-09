<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<body>
	<h1 style="font-weight: bold;text-align: center;">Add a Product</h1>
	<form action="insert_help.php" method="post">
		<table style="margin: auto;">
			<tr>
				<td><label>Product Name </label></td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr>
				<td><label>Description</label></td>
				<td><input type="text" name="des"></td>
			</tr>
			<tr>
				<td><label>Quantity</label></td>
				<td><input type="number" name="quan"></td>
			</tr>
			<tr>
				<td><label>Price</label></td>
				<td><input type="number" name="price"></td>
			</tr>
			<tr>
				<td><label>Expire Date</label></td>
				<td><input type="date" name="date"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="sub" value="ADD"></td>
			</tr>
		</table>
	</form>
</body>
</html>