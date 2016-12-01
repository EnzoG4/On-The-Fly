<?php 
	$subject = isset($_POST['subject']) ? $_POST['subject'] : "";
	$message = isset($_POST['message']) ? $_POST['message'] : "";
	$email = isset($_POST['email']) ? $_POST['email'] : "";
	$firstname = isset($_POST['firstname']) ? $_POST['firstname'] : "";
	$lastname = isset($_POST['lastname']) ? $_POST['lastname'] : "";
	$phone = isset($_POST['phone']) ? $_POST['phone'] : "";
	$password = isset($_POST['password']) ? $_POST['password'] : "";

	$finalMessage = "<html>
						<head>
							<title> On the Fly Support Email </title>
						</head>
						<body>
							<h3>A message from the $firstname $lastname</h3>
							<p> $message </p>
							<p> email: $email <br> phone: $phone </p>
							<a href='http://cscilab.bc.edu/~guevarja/onthefly/index.html'>Return to home page.</a>
						</body>
					</html>";
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'To: guevarja@bc.edu' . "\r\n";
	$headers .= 'From: ' . $firstname . " " . $lastname . "\r\n";
	$headers .= 'Cc: kimaxm@bc.edu' . "\r\n";
	$headers .= 'Bcc: kimaxm@bc.du' . "\r\n";
	$subject = "$subject";

	mail('guevarja@bc.edu', $subject, $finalMessage, $headers);
?>
<!DOCTYPE html>
<html lang = "en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset = UTF-8"/>
	<meta name = "viewport" content = "width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
	<title> On The Fly - Login </title>

	<!-- CSS -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  	<link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  	<link href="../css/style.css" type="text/css"  rel="stylesheet" media="screen,projection"/>
</head>
	<body>
		<div class ="navbar-fixed">
		<nav class = "white" role = "navigation">
			<div class = "nav-wrapper container">
				<a id ="logo-container" href = "../index.html" class ="brand-logo" style = 'color:black ;'>On the Fly</a>
				<ul class = "right hide-on-med-and-down" id = "navbar-items">
					<li><a class = 'waves-effect waves-light modal-trigger' href = '#mapModal' ><i class = "material-icons prefix" style = 'color:#e57373 ;'>map</i></a></li>
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
			function emailForm($email, $firstname, $lastname, $phone, $password){
				echo ("
					<div id = 'emailModal' class = 'modal modal-fixed-footer'>
						<div class = 'modal-content'>
							<h4 class = 'thin'>Email Administrators</h4>
							<form method = 'POST' name = 'emailForm' id = 'emailForm' action = 'email.php'>
								<input type = 'hidden' name = 'email' value = '$email'>
								<input type = 'hidden' name = 'firstname' value = '$firstname'>
								<input type = 'hidden' name = 'lastname' value = '$lastname'>
								<input type = 'hidden' name = 'phone' value = '$phone'>
								<input type = 'hidden' name = 'password' value = '$password'>
								<div class = 'row'>	
									<div class = 'input-field col s5'>
										<i class = 'material-icons prefix'>subject</i>
										<input type = 'text' name = 'subject' class = 'validate'>
										<label for 'firstname'>Subject</label>
									</div>
								</div>
								<div class = 'row'>
									<div class = 'input-field col s12'>
										<i class = 'material-icons prefix'>message</i>
										<textarea rows = '4' cols = '50' name = 'message' class = 'materialize-textarea' id = 'message'></textarea>
										<label for 'message'>Message</label>
									</div>
								</div>
								<div class = 'col s11'>
									<button class='btn waves-effect waves-light' type= 'submit' name='sendEmail' style = 'float:right; margin-left: 15px;'>Submit
										<i class='material-icons right'>send</i>
									</button>
									<button type = 'reset' name = 'reset' style ='float:right;' class = 'waves-effect waves-light btn red'>Reset
									</button>
								</div>
							</form>
						</div>
						<div class='modal-footer'>
			      			<a href='#!'' class='modal-action modal-close btn-flat' >Close</a>
			    		</div>
					</div>

					");
			}
			function displayMenu($result, $student_id){

				?>
					<div id = 'menuModal' class = 'modal modal-fixed-footer'>
						<div class = 'modal-content'>
							<h4 class = 'thin'>Menu </h4>
							<h6 class = 'thin'>Here's what's on the menu today:</h6>
							<table class = 'bordered'>
								<thead>
									<tr>
										<th data-field = 'id'>Listing ID</th>
										<th data-field = 'name'>Name</th>
										<th data-field = 'type'>Type</th>
										<th data-field = 'price'>Price</th>
									</tr>

				<?php 
					while($sql = mysqli_fetch_assoc($result)){
						echo "<tr>";
						echo "<td>" . $sql['listing_id'] . "</td>";
						echo "<td>" . $sql['listing_name'] . "</td>";
						echo "<td>" . $sql['type'] . "</td>";
						echo "<td>" . "$" . $sql['price'] . "</td>";
						echo "</tr>";
					}
					echo "</thead>";
					echo "</table>";
					echo "</div>";
					echo "<div class='modal-footer'>
			      			<a href='#!'' class='modal-action modal-close btn-flat' >Close</a>
			      			<form method = 'POST' name = 'orderForm' id = 'orderForm' action = 'http://cscilab.bc.edu/~choify/onthefly/choose.php'>
			      				<input type = 'hidden' name = 'student_id' value = '$student_id'>
			      				<button class='btn waves-effect waves-light' type= 'submit' name='order' style = 'float:right; margin-left: 15px;'>Order Now<i class='material-icons right'>send</i></button>
			      			</form>
			    		</div>
			    	</div>";


			}
			function displayHome($firstname, $lastname){
				echo ("
					<div class = 'container'>
						<div class = 'section'>
							<div class = 'row center'>
								<h2>Welcome $firstname $lastname!</h2>
							</div>
						</div>
					</div>
					<div class = 'container'>
						<div class = 'section'>
							<div class = 'row'>
								<div class = 'col s12 m4 side' style = 'text-align: center;'>
									<a class = 'waves-effect waves-light btn modal-trigger red lighten-2 tile hoverable' href = '#emailModal' ><i class = 'material-icons tile'>email</i><br>Support</a>
								</div>

								<div class = 'col s12 m4 side' style = 'text-align: center'>
									<a class = 'waves-effect waves-light btn red lighten-2 tile modal-trigger hoverable' href = '#menuModal' ><i class = 'material-icons tile'>restaurant</i><br>Order</a>
								</div>

								<div class = 'col s12 m4 side' style = 'text-align: center'>
									<a class = 'waves-effect waves-light btn modal-trigger red lighten-2 tile hoverable' href = '#profileModal' ><i class = 'material-icons tile'>settings</i><br>Profile</a>
								</div>
							</div>
						</div>
					</div>
					<div id = 'mapModal' class = 'modal modal-fixed-footer'>
						<div class = 'modal-content'>
							<h4 class = 'thin'>Map</h4>
							<iframe width='100%' style='height: 100vh;' src='https://www.google.com/maps/embed/v1/place?q=Boston%20College,%MA
      						&zoom=16
      						&key=AIzaSyCYf_rKOhjJxqS2Sk6pyf8PXCSMfOzfnzY'>
  							</iframe>
  						</div>
  						<div class='modal-footer'>
			      			<a href='#!' class='modal-action modal-close btn-flat' >Close</a>
			    		</div>
					</div>

					");
			}

			function createProfile($student_id, $firstname, $lastname, $email, $phone, $eagle_id, $dorm, $room){
				echo ("
					<div id = 'profileModal' class = 'modal modal-fixed-footer'>
						<div class = 'modal-content'>
							<h4 class = 'thin'> Profile Information </h4>
							<ul class = 'collection'>
								<li class = 'collection-item avatar'>
									<i class = 'material-icons circle' style = 'background-color: red;'>face</i>
									<span class = 'title'>Student ID</span>
									<p> $student_id </p>
									<span class = 'title'>Name</span>
									<p> $firstname $lastname </p>
								</li>
								<li class = 'collection-item avatar'>
									<i class = 'material-icons circle' style = 'background-color: blue;'>email</i>
									<span class = 'title'>Email</span>
									<p> $email </p>
								</li>
								<li class = 'collection-item avatar'>
									<i class = 'material-icons circle' style = 'background-color: green;'>phone_iphone</i>
									<span class = 'title'>Phone</span>
									<p> $phone </p>
								</li>
								<li class = 'collection-item avatar'>
									<i class = 'material-icons circle' style = 'background-color: pink;'>home</i>
									<span class = 'title'>Address</span>
									<p> $dorm Hall <br> Room: $room </p>
								</li>
								<li class = 'collection-item avatar'>
									<i class = 'material-icons circle' style = 'background-color: black;'>credit_card</i>
									<span class = 'title'>Eagle ID</span>
									<p> $eagle_id </p>
								</li>
							</ul>
						</div>
						<div class='modal-footer'>
			      			<a href='#!'' class='modal-action modal-close btn-flat' >Close</a>
			    		</div>
					</div>
					");
			}
			include ("dbconn.php");
			$dbname = "guevarja";
			$dbc = connect_to_db($dbname);

			$query = "SELECT * FROM `Customers` WHERE `email` = '$email'";
			$result = perform_query($dbc, $query);

			if ($emailPass = mysqli_fetch_array($result, MYSQLI_ASSOC)){
				$query = "SELECT `student_id`, `firstname`, `lastname`, `email`, `phone`,`eagle_id`, `dorm`, `room`, `password` FROM `Customers` WHERE `email` = '$email'";
				$result = perform_query($dbc, $query);

				$student_id = "";
				$firstname = "";
				$lastname = "";
				$passwordVerification = "";
				$email = "";
				$phone = "";
				$eagle_id = "";
				$dorm = "";
				$room = "";

				// $query2 = "SELECT `firstname` FROM `Customers` WHERE `email` = '$email'";
				// $result2 = perform_query($dbc, $query2);

				
				$passwordVerification = "";
				while ($sql = mysqli_fetch_assoc($result)){
					$student_id = $sql['student_id'];
					$firstname = $sql['firstname'];
					$lastname = $sql['lastname'];
					$passwordVerification = $sql['password'];
					$email = $sql['email'];
					$phone = $sql['phone'];
					$eagle_id = $sql['eagle_id'];
					$dorm = $sql['dorm'];
					$room = $sql['room'];
				}

				// while ($sql1 = mysqli_fetch_assoc($result2)){
				// 	$userName = $sql1['firstname'];
				// }
				if ($passwordVerification == sha1($password)){
					displayHome($firstname, $lastname);
					createProfile($student_id, $firstname, $lastname, $email, $phone, $eagle_id, $dorm, $room);
					emailForm($email, $firstname, $lastname, $phone, $password);

					$query = "SELECT listing_id, listing_name, type, price FROM `Listing`";
					$result = perform_query($dbc, $query);

					displayMenu($result, $student_id);
				}
				else if ($passwordVerification != sha1($password)){
					echo ("<br><br>
							<div class='container'>
			        			<div class='col s12 m6'>
			          				<div class='card red lighten-2'>
			            				<div class='card-content white-text'>
			             					<span class='card-title'>Error</span>
			              					<p>The password entered does not match the one on record. Please try again.</p>
			            				</div>
			            			<div class='card-action'>
			              				<a href='../index.html'>Return to Home Page</a>
			            			</div>
			          			</div>
			        		</div>
			      		</div>
					");
				}

			}
			else {
				echo ("
					<br>
					<br>
					<div class='container'>
	        			<div class='col s12 m6'>
	          				<div class='card red lighten-2'>
	            				<div class='card-content white-text'>
	             					<span class='card-title'>Error</span>
	              					<p>The email entered does not exist in our database. Please try again.</p>
	            				</div>
	            				<div class='card-action'>
	              					<a href='../index.html'>Return to Home Page</a>
	            				</div>
	          				</div>
	        			</div>
	      			</div>
					");
			}


		?>
			
	</body>
</html>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="../js/materialize.js"></script>
<script src="../js/init.js"></script>
<script type = "text/javascript" src = "../js/index.js"></script>