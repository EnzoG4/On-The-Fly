<?php
	include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>On the Fly: Runner</title>
</head>

<body>
	<table>
		<tr>
			<th>Posted</th>
			<th>Dorm</th>
			<th>Room</th>
			<th>Dining Hall</th>
		</tr>

	<?php
	$dbc = connect_to_db('guevarja');
	
	$array = getArray();
	$list = implode(',', $array);
	
	
	$sql = "SELECT * FROM Orders WHERE order_id IN ($list)";
	$query = perform_query($dbc, $sql);
	
	while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
	?>
		<tr>
			<td><?php echo $row['curdate'] ?></td>
			<td><?php echo getDorm($row['student_id'])?></td>
			<td><?php echo getRoom($row['student_id'])?></td>
			<td><?php echo $row['dininghall'] ?></td>
			<td><form method='post' action=deliver.php><input type='hidden' name='orderId' value="<?php echo $row['order_id'] ?>"><button type=submit>Deliver</button></form></td>
		</tr>
	
	<?php 
	} ?>
	</table>
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

function getArray(){
	$dbc = connect_to_db('guevarja');
	$sql = "SELECT order_id FROM Need";
	$query = perform_query($dbc, $sql);
	$array = array();
	while($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
		array_push($array, $row['order_id']);
	return $array;
}
?>
