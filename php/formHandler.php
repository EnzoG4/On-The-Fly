<!DOCTYPE html>
<html lang = "en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset = UTF-8"/>
	<meta name = "viewport" content = "width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
	<title> On The Fly - Account Creation </title>

	<!-- CSS -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  	<link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  	<link href="css/style.css" type="text/css"  rel="stylesheet" media="screen,projection"/>
</head>
	<body>
	</body>
</html>
<?php
	include ("dbconn.php");
	$dbname = "guevarja";
	$dbc = connect_to_db($dbname);

	$first = isset($_POST['firstname']) ? $_POST['firstname'] : "";
	$last = isset($_POST['lastname']) ? $_POST['lastname'] : "";
	$email = isset($_POST['email']) ? $_POST['email'] : "";
	$password = isset($_POST['password']) ? $_POST['password'] : "";
	$password1 = isset($_POST['password1']) ? $_POST['password1'] : "";
	$phone = isset($_POST['phone']) ? $_POST['phone'] : "";
	$dorm = isset($_POST['dorm']) ? $_POST['dorm'] : "";
	$room = isset($_POST['room']) ? $_POST['room'] : "";
	$eagle_id = isset($_POST['eagleID']) ? $_POST['eagleID'] : "";

	$phone = preg_replace('/\D+/', '', $phone);

	$query = "SELECT * FROM `Customers` WHERE `email` = '$email'";
	$result = perform_query($dbc, $query);

	$query2 = "SELECT * FROM `Customers` WHERE `eagle_id` = '$eagle_id'";
	$result2 = perform_query($dbc, $query2);

	if ($emailPass = mysqli_fetch_array($result, MYSQLI_ASSOC)){
		echo ("email has already been used to create an account.");
		}
	else if(trim($first) == ""){
		echo("enter firstname.");
	}
	else if(trim($last) == ""){
		echo ("enter lastname.");
	}
	else if(trim($email) == ""){
		echo ("enter an email.");
	}
	else if(trim($password) == "" || trim($password1) == ""){
		echo ("enter a password.");
	}
	else if (trim($phone) == ""){
		echo ("enter a phone number.");
	}
	else if (trim($dorm) == ""){
		echo ("select your dorm.");
	}
	else if (trim($room) == ""){
		echo ("enter your room number.");
	}
	else if (trim($eagle_id) == ""){
		echo ("enter your eagle_id");
	}
	else if ($eagle_idPass = mysqli_fetch_array($result2 , MYSQLI_ASSOC)){
		echo ("eagle ID has already been used to create an account.");
	}
	else if($password != $password1){
		echo ("passwords entered do not match");
	}
	else{
		$query = "INSERT INTO `Customers` (date, firstname, lastname, email, password, password1, phone, eagle_id, dorm, room) VALUES (now(), '$first', '$last', '$email', sha1('$password'), sha1('$password1'), '$phone', '$eagle_id', '$dorm', '$room')";

		$result = perform_query($dbc, $query);

		echo ("success!");
		}
	$link = mysql_connect('localhost', 'guevarja', 'Gk2naGu9');
	mysql_close($link);
?>
