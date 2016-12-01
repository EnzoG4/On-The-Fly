<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>cart</title>
</head>

<?php 
    if(isset($_POST['submit'])){ 
        foreach($_POST['quantity'] as $key => $val)
        	$_SESSION['cart'][$key]['quantity']=$val; 
    }   
?> 

<body>
	<h1>Cart</h1>  
	<table> 
		<tr> 
			<th>Name</th> 
			<th>Quantity</th> 
			<th>Price</th> 
		</tr> 
	  
		<?php 
		$totalprice=0; 
		if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
			$dbc = connect_to_db('guevarja');
			
			$sql="SELECT * FROM Listing WHERE listing_id IN ("; 
			foreach($_SESSION['cart'] as $id => $value) { 
				$sql.=$id.","; 
			} 
			$sql=substr($sql, 0, -1).") ORDER BY listing_name ASC"; 
			
			$query = perform_query($dbc, $sql);
			
			while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)){ 
				$subtotal=$_SESSION['cart'][$row['listing_id']]['quantity']*$row['price']; 
				$totalprice+=$subtotal; 
			?> 
				<tr> 
					<td><?php echo $row['listing_name'] ?></td> 
					<td><input type="text" name="quantity[<?php echo $row['listing_id'] ?>]" size="5" value="<?php echo $_SESSION['cart'][$row['listing_id']]['quantity'] ?>" /></td> 
					<td>$<?php echo $row['price'] ?></td> 
				</tr> 
			<?php 
	  
			} 
		}
		else echo "<p>Your cart is empty</p>";
		?> 
		
		<tr> 
			<td colspan="4">Total Price: <?php echo $totalprice ?></td> 
		</tr> 
	</table> 
	<br /> 
	
	<form action="http://cscilab.bc.edu/~choify/onthefly/checkout.php" method='post'>
			<button type='submit' name='checkout'>Check out</button>
	</form>
	
</body>
</html>
