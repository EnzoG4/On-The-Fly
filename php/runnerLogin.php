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
							<form method = 'POST' name = 'emailForm' id = 'emailForm' action = 'emailadmin.php'>
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
			function displayOrder($result, $runner_id){

				?>
					<div id = 'orderModal' class = 'modal modal-fixed-footer'>
						<div class = 'modal-content'>
							<h4 class = 'thin'>Orders </h4>
							<h6 class = 'thin'>Pick up these orders</h6>
							<table class = 'bordered'>
								<thead>
									<tr>
										<th data-field = 'date'>Date</th>
										<th data-field = 'id'>Order ID</th>
										<th data-field = 'name'>Customer Name</th>
										<th data-field = 'location'>Delivery Location</th>
										<th data-field = 'phone'>Phone</th>
										<th data-field = 'price'>Cost</th>
									</tr>

				<?php 
					while($sql = mysqli_fetch_assoc($result)){
						echo "<tr>";
						echo "<td>" . $sql['curdate'] . "</td>";
						echo "<td>" . $sql['order_id'] . "</td>";
						echo "<td>" . $sql['firstname'] . " " . $sql['lastname'] . "</td>";
						echo "<td>" . $sql['dorm'] . " " . $sql['room'] ."</td>";
						echo "<td>" . $sql['phone'] . "</td>";
						echo "<td>" . "$" . $sql['balance'] . "</td>";
						echo "</tr>";
					}
					echo "</thead>";
					echo "</table>";
					echo "</div>";
					echo "<div class='modal-footer'>
							<form method = 'POST' name = 'orderForm' id = 'orderForm' action = 'http://cscilab.bc.edu/~choify/onthefly/pick.php'>
								<input type = 'hidden' name = 'runner_id' value = '$runner_id'>
								<button class='btn waves-effect waves-light' type= 'submit' name='order' style = 'float:right; margin-left: 15px;'>Order Now<i class='material-icons right'>send</i></button>
			      			</form>
			      			<a href='#!'' class='modal-action modal-close btn-flat' >Close</a>
			    		</div>
			    	</div>";


			}
			function displayHome($firstname, $lastname){
				echo ("
					<div class = 'container'>
						<div class = 'section'>
							<div class = 'row center'>
								<h2>Welcome $firstname $lastname!</h2><br><br>
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
									<a class = 'waves-effect waves-light btn modal-trigger red lighten-2 tile hoverable' href = '#orderModal' ><i class = 'material-icons tile'>attach_money</i><br>Pick Up Orders</a>
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

			function createProfile($runner_id, $firstname, $lastname, $email, $phone){
				echo ("
					<div id = 'profileModal' class = 'modal modal-fixed-footer'>
						<div class = 'modal-content'>
							<h4 class = 'thin'> Profile Information </h4>
							<ul class = 'collection'>
								<li class = 'collection-item avatar'>
									<i class = 'material-icons circle' style = 'background-color: red;'>face</i>
									<span class = 'title'>Runner ID</span>
									<p> $runner_id </p>
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

			$email = isset($_POST['email']) ? $_POST['email'] : "";
			$password = isset($_POST['password']) ? $_POST['password'] : "";

			$query = "SELECT * FROM `Runners` WHERE `email` = '$email'";
			$result = perform_query($dbc, $query);
			if ($emailPass = mysqli_fetch_array($result, MYSQLI_ASSOC)){
				$query = "SELECT `runner_id`, `firstname`, `lastname`, `email`, `phone`, `password` FROM `Runners` WHERE `email` = '$email'";
				$result = perform_query($dbc, $query);

				$runner_id = "";
				$firstname = "";
				$lastname = "";
				$passwordVerification = "";
				$email = "";
				$phone = "";

				// $query2 = "SELECT `firstname` FROM `Customers` WHERE `email` = '$email'";
				// $result2 = perform_query($dbc, $query2);

				
				while ($sql = mysqli_fetch_assoc($result)){
					$runner_id = $sql['runner_id'];
					$firstname = $sql['firstname'];
					$lastname = $sql['lastname'];
					$passwordVerification = $sql['password'];
					$email = $sql['email'];
					$phone = $sql['phone'];
				}

				// while ($sql1 = mysqli_fetch_assoc($result2)){
				// 	$userName = $sql1['firstname'];
				// }
				if ($passwordVerification == sha1($password)){
					displayHome($firstname, $lastname);
					createProfile($runner_id, $firstname, $lastname, $email, $phone);
					emailForm($email, $firstname, $lastname, $phone, $password);

					$query = "SELECT Orders.order_id, Customers.firstname, Customers.lastname, Customers.dorm, Customers.room, Customers.phone, Orders.runner_id, Orders.curdate,  Orders.balance FROM Orders INNER JOIN Customers ON Orders.student_id = Customers.student_id INNER JOIN Runners ON Orders.runner_id = Runners.runner_id WHERE Runners.email = '$email'";
					$result = perform_query($dbc, $query);

					displayOrder($result, $runner_id);

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