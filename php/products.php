
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Listing</title>
</head>

<?php 
if(isset($_GET['action']) && $_GET['action']=="add"){ 
	addThis();
}

if(isset($_GET['action']) && $_GET['action']=="sub"){ 
	subtractThis();
}

if(isset($_GET['action']) && $_GET['action']=="delete"){ 
	deleteThis();
}
	
  
?>
<body> 
    <h1>Menu</h1> 
    <?php 
        if(isset($message)) 
            echo "<h2>$message</h2>"; 
    ?> 
    <table> 
        <tr> 
            <th>Name</th> 
            <th> </th> 
            <th>Price</th>  
        </tr> 
          
        <?php 
        	$dbc = connect_to_db('guevarja');
            $sql="SELECT * FROM Listing"; 
            $myData = perform_query($dbc, $sql); 
              
            while ($row=mysqli_fetch_array($myData, MYSQLI_ASSOC)) {        
        ?> 
            <tr> 
                <td><?php echo $row['listing_name'] ?></td> 
                <td><?php echo $row['type'] ?></td> 
                <td>$<?php echo $row['price'] ?></td> 
                <td><form method='post' action='http://cscilab.bc.edu/~choify/onthefly/order.php?page=Listing&action=add&id=<?php echo $row['listing_id'] ?>'><button type=submit>+</button></form><td>
                <td><form method='post' action='http://cscilab.bc.edu/~choify/onthefly/order.php?page=Listing&action=sub&id=<?php echo $row['listing_id'] ?>'><button type=submit>-</button></form><td>
                <td><form method='post' action='http://cscilab.bc.edu/~choify/onthefly/order.php?page=Listing&action=delete&id=<?php echo $row['listing_id'] ?>'><button type=submit>X</button></form><td>
            </tr> 
        <?php   
            }
        ?> 
          
    </table>
   
</body>
</html>

<?php
function addThis(){
	$id=intval($_GET['id']); 
	  
	if(isset($_SESSION['cart'][$id])){ 
		$_SESSION['cart'][$id]['quantity']++; 
	}
	else{ 
		$dbc = connect_to_db('guevarja');
		$sql_s="SELECT * FROM Listing WHERE listing_id='$id'"; 
		$query_s = perform_query($dbc, $sql_s);
		$row_s = mysqli_fetch_array($query_s, MYSQLI_ASSOC);
		if(sizeof($row_s) != 0){ 
			$_SESSION['cart'][$row_s['listing_id']]=array( 
					"quantity" => 1, 
					"price" => $row_s['price'] 
			); 
		}
		else 
			$message="This product id it's invalid!"; 	    
	} 
}

function subtractThis(){
	$id=intval($_GET['id']);
	
	if(isset($_SESSION['cart'][$id])){ 
		if($_SESSION['cart'][$id]['quantity'] > 0)
			$_SESSION['cart'][$id]['quantity']--;
	}
}

function deleteThis() {
	$id=intval($_GET['id']);
	unset($_SESSION['cart'][$id]);
}
