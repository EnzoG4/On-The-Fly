<?php
	session_start(); 
	include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>On The Fly: Order</title>
	<link rel='stylesheet' href='order.css' />
</head>
  
<body> 
	<?php
		if(isset($_POST['carney']))
			$_SESSION['dh']='carney';
		if(isset($_POST['corcoran']))
			$_SESSION['dh']='corcoran';
	?>
	
	<div id="menu"> 
		<?php require('products.php'); ?> 
	</div>
	  
	<div id="cart"> 
		<?php require('cart.php');?>
	</div>
  
</body> 
</html>
