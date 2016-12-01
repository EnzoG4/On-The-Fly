<!DOCTYPE html>
<html lang = "en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset = UTF-8"/>
	<meta name = "viewport" content = "width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
	<title> On The Fly - Account Creation </title>

	<!-- CSS -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  	<link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
	<body>
		<div class ="navbar-fixed">
		<nav class = "white" role = "navigation">
			<div class = "nav-wrapper container">
				<a id ="logo-container" href = "../index.html" class ="brand-logo" style = 'color:black ;'>On the Fly</a>
				<ul class = "right hide-on-med-and-down">
					<li><a class="waves-effect waves-light" href = "../index.html"><i class = "material-icons prefix" style = 'color:#e57373 ;'>home</i></a></li>
				</ul>
				<ul id ="nav-mobile" class= "side-nav">
					<li><a href = "#">Navbar Link</a></li>
				</ul>
				<a href = "#" data-activates="nav-mobile" class = "button-collapse"><i class = "material-icons">menu</i></a>
			</div>
		</nav>
		</div>
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

		$phone = preg_replace('/\D+/', '', $phone);

		$query = "SELECT * FROM `Runners` WHERE `email` = '$email'";
		$result = perform_query($dbc, $query);

		if ($emailPass = mysqli_fetch_array($result, MYSQLI_ASSOC)){
			echo ("email has already been used to create an account.");
			}
		else{
			$query = "INSERT INTO `Runners` (date, firstname, lastname, email, password, password1, phone) VALUES (now(), '$first', '$last', '$email', sha1('$password'), sha1('$password1'), '$phone')";

			$result = perform_query($dbc, $query);
			echo ("
				<div class = 'container'>
		        		<div class='col s12 m7'>
		          			<div class='card'>
		            			<div class='card-image valign-wrapper'>
		              				<img class = 'valign' src='../images/bc.jpg'>
		              				<span class='card-title'>Success!</span>
		            			</div>
		            			<div class='card-content'>
		              				<p id = 'card'>Congratulations! Your account has been successfully created. You can now start processing orders!</p>
		            			</div>
		            			<div class='card-action'>
		              				<a href='../index.html'>Return to Home Page</a>
		            			</div>
		          			</div>
		        		</div>
		      		</div>
				");
		}

		$link = mysql_connect('localhost', 'guevarja', 'Gk2naGu9');
		mysql_close($link);



