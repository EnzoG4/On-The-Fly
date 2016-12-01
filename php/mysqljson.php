<?php

$omitlist = isset($_COOKIE['omit']) ? $_COOKIE['omit']: '0' ;

if(isset($_POST['hide'])){
	$id = $_POST['remove'];
	$cookie = $omitlist.", ".$id;
 	setcookie ('omit', $cookie);
 	header('Location: ontheflyadmin.php');
 }



	$dbc = @mysqli_connect("localhost", "guevarja", "Gk2naGu9", "csci2254")
	       or die("Could not open db, " . mysqli_connect_error());
	
	///where attraction_id not in ('1')
	$query = "select name, entered_by, category , stars, price_range, url, comment, attraction_id FROM `bestofbc` where attraction_id not in ($omitlist)";
	$result = mysqli_query($dbc, $query);
	
	if ( mysqli_num_rows( $result ) == 0 ) {
		die("bad query $query");
	}
	$bobc = array();	// put the rows as objects in an array
	while ( $obj = mysqli_fetch_object( $result ) ) {
		$bobc[] = $obj;
	}
	//header('Location: bobc.html');
	echo json_encode($bobc);
 
	
?>	
