<?php
	include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>On The Fly: Order Details</title>
</head>

<body>
	<h2>Order details: </h2></br>
	<?php
	$id=$_POST['orderId'];
	
	$dbc = connect_to_db('guevarja');
	$sql = "SELECT * FROM Orders WHERE order_id='$id'";
	$query = perform_query($dbc, $sql);
	
	while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
	?>
		Posted: <?php echo $row['curdate'] ?> </br>
		Dorm: <?php echo getDorm($row['student_id'])?></br>
		Room: <?php echo getRoom($row['student_id'])?></br>
		DiningHall: <?php echo $row['dininghall']; 
		getFoods($row['order_id']);
	}
	
	$sql2 = "delete from Need where order_id='$id'";
	perform_query($dbc, $sql2);
	
	?>
	<a href="http://cscilab.bc.edu/~guevarja/onthefly/index.html">Go back</a>
</body>
</html>

<?php
function getDorm($student_id){
	$dbc = connect_to_db('guevarja');
	$sql = "SELECT dorm FROM Customers WHERE student_id='$student_id'";
	$query = perform_query($dbc, $sql);
	while($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
		return $row['dorm'];
}

function getRoom($student_id){
	$dbc = connect_to_db('guevarja');
	$sql = "SELECT room FROM Customers WHERE student_id='$student_id'";
	$query = perform_query($dbc, $sql);
	while($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
		return $row['room'];
}

function getFoods($order_id){
	$dbc = connect_to_db('guevarja');
	$sql = "SELECT * FROM Item WHERE order_id='$order_id'";
	$query = perform_query($dbc, $sql);
	?>
	<table>
		<tr>
			<th>Name</th>
			<th>Type</th>
			<th>Price</th>
			<th>Quantity</th>
		</tr>
	<?php
	while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
	?>
		<tr>
			<td><?php echo $row['item_name'] ?></td>
			<td><?php echo $row['type'] ?></td>
			<td><?php echo $row['price'] ?></td>
			<td><?php echo $row['quantity'] ?></td>
		</tr>
	<?php
	}
	echo '</table>';
}
?>
