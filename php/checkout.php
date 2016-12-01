<?php
	include('connection.php');
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>check out</title>
</head>

<body>
	<?php 
	if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
		$dbc = connect_to_db('guevarja');
		$sql="SELECT * FROM Listing WHERE listing_id IN ("; 
		  
			foreach($_SESSION['cart'] as $id => $value) { 
				$sql.=$id.","; 
			} 
	  
			$sql=substr($sql, 0, -1).") ORDER BY listing_name ASC"; 
		
			$query = perform_query($dbc, $sql);
		
			while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)){ 
				$quantity = $_SESSION['cart'][$row['listing_id']]['quantity'];
				$menu_id = $row['menu_id'];
				$item_name = $row['listing_name'];
				$type = $row['type'];
				$price = $row['price'];
				$sql2 = "insert into Item (menu_id, item_name, type, price, quantity)
				values ('$menu_id', '$item_name', '$type', '$price', '$quantity')";
				perform_query($dbc, $sql2);
			} 
		session_destroy();
		echo '<a href="order.php">Go back</a> ';
	}
	else {
		echo 'Your cart is empty! Please fill your cart ';
		echo '<a href="order.php">Go back</a>';
	}
	?> 
		
</body>
</html>
