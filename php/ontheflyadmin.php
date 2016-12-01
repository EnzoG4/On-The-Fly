<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>admin page</title>
	<h1> Admin Page </h1>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	
	<link rel= "stylesheet" type= "text/css" href= "css/admin.css"/>
</head>
<body style="background-color:lightgrey;">
<form method = "post" action = "http://cscilab.bc.edu/~guevarja/onthefly/index.html">
	<input type = "submit" id= "register" value = "register a new customer">	
	
</form> 
<br>
<form method = "post" action = "http://cscilab.bc.edu/~choify/onthefly/choose.php">
	<input type = "submit" value = "Order page">	
</form> 
<br>
<form method = "post" action = "ontheflyadmin.php">
	<input type = "submit" id="refresh" value = "Refresh">	
</form>
<br>
                                                                                                                                                            
<?php
				displaycustomer();
				displayrunners();
				displayorders();
				echo "<br>";
				
			if(isset($_POST['delete'])){
				removecustomer();
				
				}
			if(isset($_POST['delete2'])){
				removerunner();
				
				}
			if(isset($_POST['delete3'])){
				removeorder();
				
				}
?> 
<form method = "post" action = "ontheflyadmin.php">
	<input type = "submit" id="refresh" value = "Refresh">	
</form>

<form method= "post" >
	

		<fieldset class ='fieldset3'>
		<legend> Update Customer Info </legend>
		
		First Name: <input type= "text" id= "FirstName" name = "firstname"  ><br>
		<input type = "submit" value = "get customer info" name= "getcustinfo" > <br>	
				<?php
			if (isset ($_POST['getcustinfo'] )) {
				 findCustomer(); echo"<br>";
		echo "Must know eagle ID for verification <br> ";		 
		echo"Eagle ID: <input type= 'text' id= 'eagleid' name = 'eagleid'  ><br><br>";
		echo "Enter new information <br><br>";		 
		echo"email: <input type= 'text' name= 'email' id= 'email'><br>";
		echo"Phone: <input type= 'text' id= 'phone' name = 'phone'  ><br>";		 
		echo "<select id = 'dorm' name = 'dorm'>
 			<option value='66'>66</option>
  			<option value='90'>90</option>
  			<option value='2000'>2000</option>
  			<option value='2150'>2150</option>
  			<option value='Greycliff'>Greycliff</option>
  			<option value='Gabelli'>Gabelli</option>
  			<option value='Ignacio'>Ignacio</option>
			<option value='Modulars'>Modulars</option>
			<option value='Rubenstein'>Rubenstein</option>
			<option value='Stayer'>Stayer</option>
			<option value='Vanderslice'>Vanderslice</option>
			<option value='Walsh'>Walsh</option>
			<option value='Williams'>Williams</option>
			<option value='Cheverus'>Cheverus</option>
			<option value='Claver'>Claver</option>
			<option value='Fenwick'>Fenwick</option>
			<option value='Xavier'>Xavier</option>
			<option value='Fitzpatrick'>Fitzpatrick</option>
			<option value='Gonzaga'>Gonzaga</option>
			<option value='Loyola'>Loyola</option>
			<option value='Medeiros'>Medeiros</option>
			<option value='Kostka'>Kostka</option>
		</select>" ;
		echo"room: <input type= 'text' name= 'room' id= 'room'><br><br>";
		echo" <input type = 'submit' value = 'update' name = 'update'>";
	echo" </form>";
	}
				if (isset ($_POST['update'] )) {
				 updatecustinfo();
				 echo "info has been updated";

					 }
				
		?>		
		</fieldset>
</form>


<form method= "post" >
	

		<fieldset class='fieldset4' >
		<legend> Update Flyer Info </legend>
		
		First Name: <input type= "text" id= "FirstName" name = "firstname"  ><br>
		<input type = "submit" value = "get flyer info" name= "getflyerinfo" > <br>	
				<?php
			if (isset ($_POST['getflyerinfo'] )) {
				 findflyer(); echo"<br>";
		echo "Must know last name for verification <br> ";		 
		echo"Last Name: <input type= 'text' id= 'lastname2' name = 'lastname2'  ><br><br>";
		echo "Enter new information <br><br>";		 
		echo"email: <input type= 'text' name= 'email2' id= 'email2'><br>";
		echo"Phone: <input type= 'text' id= 'phone2' name = 'phone2'  ><br>";		 
		echo" <input type = 'submit' value = 'update' name = 'update2'>";
	echo" </form>";
	}
				if (isset ($_POST['update2'] )) {
				 updateflyerinfo();
				 echo "info has been updated";

					 }
				
		?>		
		</fieldset>
</form>

<form method= "post" >
	

		<fieldset class = 'fieldset5'>
		<legend> Update Order Info </legend>
		
		OrderID <input type= "text" id= "orderid" name = "orderid"  ><br>
		<input type = "submit" value = "get order info" name= "getorderinfo" > <br>	
				<?php
			if (isset ($_POST['getorderinfo'] )) {
				 findorder(); echo"<br>";	 
	echo" </form>";
	}
				
		?>		
		</fieldset>
</form>
</body>
</html>
<?php

function displaycustomer(){
include ("dbconn2.php");
$dbname = "guevarja";
$dbc = connect_To_DB($dbname);

?>

<fieldset> 
<?php


$query = "select * FROM `Customers`";
$result = perform_Query($dbc, $query);
echo "Customer Page";
echo "<div style='height:420px; overflow:auto;'>";
echo "
	<table id = 'table1' width='100%' border='0' cellspacing='0' cellpadding='0'>"; 
 	echo "<tr>";
  	echo "<th> id </th>";
 	 echo "<th>First name</th>";
 	 echo "<th>Last name</th>";
 	 echo "<th>Email</th>";	
  	 echo "<th> Password</th>";
  	 echo "<th>Phone</th>";
  	 echo "<th>Room</th>";
  	 echo "<th>Dorm</th>";
  	 echo "<th>Eagle id</th>";
  	 	
  	echo "</tr>"; 
while($row= mysqli_fetch_array($result, MYSQLI_ASSOC)){   //Creates a loop to loop through results
echo "<tr><td>" . $row['student_id'] . "</td><td>" . $row['firstname'] . "</td><td>" . $row['lastname'] . "</td><td>" . $row['email'] . "</td><td>" . $row['password'] . "</td><td>" . $row['phone'] . "</td><td>" . $row['room'] . "</td><td>" . $row['dorm'] . "</td><td>" . $row['eagle_id'] . "</td><td><form method= 'post' > <input type='hidden' name= 'remove' id='remove' value =". $row['student_id'] . " /> <input type='submit' value = 'delete' id= 'delete' name='delete' /> </form></td </tr>"; 
}

echo "</table>";
echo "</div>"; 



?>
</fieldset>

<?php
}
			if (isset ($_POST['send'] )) {
				 sendmail();
			}  

function displayrunners(){
$dbname = "guevarja";
$dbc = connect_To_DB($dbname);

?>

<fieldset class ='fieldset7'> 
<?php


$query = "select * FROM `Runners`";
$result = perform_Query($dbc, $query);
echo "Runners page";
echo "<div style='height:400px; overflow:auto;'>";
echo "<table id = 'table2' width='100%' border='0' cellspacing='0' cellpadding='0'>";
 	echo "<tr>";
  	echo "<th> id </th>";
 	 echo "<th>First name</th>";
 	 echo "<th>Last name</th>";
 	 echo "<th>email</th>";	
  	 echo "<th> Password1</th>";
  	 echo "<th>phone</th>";	
  	echo "</tr>"; 
while($row= mysqli_fetch_array($result, MYSQLI_ASSOC)){   //Creates a loop to loop through results
echo "<tr><td>" . $row['runner_id'] . "</td><td>" . $row['firstname'] . "</td><td>" . $row['lastname'] . "</td><td>" . $row['email'] . "</td><td>" . $row['password'] . "</td><td>" . $row['phone'] . "</td><td><form method= 'post' > <input type='hidden' name= 'remove2' id='remove2' value =". $row['email'] . " /> <input type='submit' value = 'delete' id= 'delete2' name='delete2' /> </form></td> </tr>"; 
}

echo "</table>"; 
echo "</div>"; 

?> 
</fieldset>
<?php
}

function displayorders(){
$dbname = "guevarja";
$dbc = connect_To_DB($dbname);

?>

<fieldset class ='fieldset2'> 
<?php


$query = "select * FROM `Orders";
$result = perform_Query($dbc, $query);
echo "Orders page";
echo "<div style='height:400px; overflow:auto;'>";
echo "<table id = 'table3' width='100%'>";
 	echo "<tr>";
  	echo "<th> Order ID</th>";
 	 echo "<th>Student ID</th>";
 	 echo "<th>Runner ID</th>";
 	 echo "<th>Date </th>";	
  	 echo "<th> Balance</th>";
  	 echo "<th>Used</th>";
  	 echo "<th>Dining Hall</th>";
  	echo "</tr>"; 
while($row= mysqli_fetch_array($result, MYSQLI_ASSOC)){   //Creates a loop to loop through results
echo "<tr><td>" . $row['order_id'] . "</td><td>" . $row['student_id'] . "</td><td>" . $row['runner_id'] . "</td><td>" . $row['curdate'] . "</td><td>" . $row['balance'] . "</td><td>" . $row['used'] . "</td><td>" . $row['dininghall'] . "</td><td><form method= 'post' > <input type='hidden' name='remove3' id='remove3' value =". $row['order_id'] . " /> <input type='submit' value = 'delete' id= 'delete3' name='delete3' /> </form></td> </tr>"; 
}

echo "</table>"; 
echo "</div>";
?> 
</fieldset>
<?php
}




?>
	<form method = "post" >
	<fieldset class= 'fieldset6'>
		<legend> Createmail group </legend>
<?php
	echo "<a href='ontheflyadmin.php'>refresh the page </a> <br>";
	echo "email address <br><input type= 'text' name = 'email' id = 'email' onblur = 'emailval()'> <div id='error1'></div> <br>" ; 
	echo "Subject <br><input type= 'text' name = 'subject' id = 'subval' onblur = 'subval()'> <div id='error2'></div> <br>" ; 
	echo "Mail password  <br><input type= 'password' name = 'password' id = 'emailpass'  onblur = 'passval()'>  <div id='error3'></div><br>";
	echo "Message: <br> <textarea rows='4' cols='50' name = 'msg' id= 'message' onblur = 'messval()'> </textarea>   <div id='error4'> </div> <br>";
	echo "<input type='hidden' name='type' value='nothing'>";
	echo "Customer <input type='radio' name='type' value='customer' ><br>  ";
	echo "Delivery <input type='radio' name='type' value='deliverers'> <br> <br>";
	?>
	<input type = "submit" name = "send" value = "send"> 
	</form>
</fieldset>		



<?php





function sendmail(){
include ("dbconn2.php");
$dbname = "guevarja";
$dbc = connect_to_db($dbname);

$emailadd = $_POST['email'];
$subject = $_POST['subject'];
$msg = $_POST['msg'];
$password = $_POST['password'];
$type = $_POST['type'];

$query = "select * FROM `Customers` WHERE `email` = '$emailadd'";
$query2 = "select * FROM `Runners` WHERE `email` = '$emailadd'";
$result= perform_Query($dbc, $query); 
$result2= perform_Query($dbc, $query2);
if($password == "testing"){
	 if($email= mysqli_fetch_array($result, MYSQLI_ASSOC) or $email2= mysqli_fetch_array($result, MYSQLI_ASSOC)){
		mail("$emailadd", $subject, $msg);
		echo "email has been sent";
		
	
	} else if ($type == "customer" ) {
		$query = "select * FROM `Customers`";
		$result= perform_Query($dbc, $query);
  
		while ($row = mysqli_fetch_array( $result, MYSQLI_ASSOC )){

			$email = $row['email'];

				mail("$email", $subject, $msg);
		}
		}else if ($type == "deliverers" ) {
		$query = "select * FROM `Runners`";
		$result= perform_Query($dbc, $query);
  
		while ($row = mysqli_fetch_array( $result, MYSQLI_ASSOC )){

			$email = $row['email'];

				mail("$email", $subject, $msg);
		}
		
	}
	
		else{
		echo "This email does not exist in the database";
		}

}

else{
	echo "wrong password";
	}
}



function removecustomer(){
$dbname = "guevarja";
$dbc = connect_to_db($dbname);

$id = $_POST['remove'];


$query = "DELETE FROM `Customers` WHERE student_id = '$id' ";
$result= perform_Query($dbc, $query);
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=ontheflyadmin.php">';


}


function removerunner(){
$dbname = "guevarja";
$dbc = connect_to_db($dbname);

$email = $_POST['remove2'];

echo "<script>
alert('COMEON');
</script>";

$query = "DELETE FROM `Runners` WHERE email = '$email' ";
$result= perform_Query($dbc, $query);
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=ontheflyadmin.php">';


}

function removeorder(){
$dbname = "guevarja";
$dbc = connect_to_db($dbname);

$id = $_POST['remove3'];

echo "<script>
alert('COMEON');
</script>";

$query = "DELETE FROM `Orders` WHERE order_id = '$id' ";
$result= perform_Query($dbc, $query);
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=ontheflyadmin.php">';

}

function findCustomer(){
$dbname = "guevarja";
$dbc = connect_to_db($dbname);

$name = $_POST['firstname'];
$query = "select * FROM `Customers` WHERE firstname = '$name' ";

$result= perform_Query($dbc, $query);

echo "<table width='100%'>"; 

 	echo "<tr>";
  	echo "<th> id </th>";
 	 echo "<th>First name</th>";
 	 echo "<th>Last name</th>";
 	 echo "<th>email</th>";	
  	 echo "<th> Password1</th>";
  	 echo "<th> Room</th>";
  	 echo "<th>dorm</th>";
  	 echo "<th>eagle id</th>";	
  	 echo "<th>phone</th>";
  	echo "</tr>";
while($row= mysqli_fetch_array($result, MYSQLI_ASSOC)){   //Creates a loop to loop through results
echo "<tr><td>" . $row['student_id'] . "</td><td>" . $row['firstname'] . "</td><td>" . $row['lastname'] . "</td><td>" . $row['email'] . "</td><td>" . $row['password'] . "</td><td>" . $row['room'] . "</td><td>" . $row['dorm'] . "</td><td>" . $row['eagle_id'] . "</td><td>" . $row['phone'] . "</td><td><form method= 'post' > <input type='hidden' name= 'remove' id='remove' value =". $row['student_id'] . " /> <input type='submit' value = 'delete' id= 'delete' name='delete' /> </form></td </tr>"; 
	}

echo "</table>";

}


function findflyer(){
$dbname = "guevarja";
$dbc = connect_to_db($dbname);

$name = $_POST['firstname'];
$query = "select * FROM `Runners` WHERE firstname = '$name' ";

$result= perform_Query($dbc, $query);

echo "<table>"; 

 	echo "<tr>";
  	echo "<th> id </th>";
 	 echo "<th>First name</th>";
 	 echo "<th>Last name</th>";
 	 echo "<th>email</th>";	
  	 echo "<th> Password1</th>";
  	 echo "<th>password2</th>";
  	 echo "<th>phone</th>";;	
  	echo "</tr>";
while($row= mysqli_fetch_array($result, MYSQLI_ASSOC)){   //Creates a loop to loop through results
echo "<tr><td>" . $row['runner_id'] . "</td><td>" . $row['firstname'] . "</td><td>" . $row['lastname'] . "</td><td>" . $row['email'] . "</td><td>" . $row['password'] . "</td><td>" . $row['password'] . "</td><td padding:0 15px 0 15px;>" . $row['phone'] . "</td><td><form method= 'post' > <input type='hidden' name= 'remove2' id='remove2' value =". $row['email'] . " /> <input type='submit' value = 'delete' id= 'delete2' name='delete2' /> </form></td </tr>"; 
	}

echo "</table>";


}

function findorder(){
$dbname = "guevarja";
$dbc = connect_to_db($dbname);

$id = $_POST['orderid'];
$query = "select * FROM `Orders` WHERE order_id = '$id' ";

$result= perform_Query($dbc, $query);

echo "<table>"; 
 	echo "<tr>";
  	echo "<th>Order ID </th>";
 	 echo "<th>Student ID</th>";
 	 echo "<th>Runner ID</th>";
 	 echo "<th>Date </th>";	
  	 echo "<th> Balance</th>";
  	 echo "<th>Used</th>";
  	 echo "<th>Used</th>";
  	echo "</tr>"; 
while($row= mysqli_fetch_array($result, MYSQLI_ASSOC)){   //Creates a loop to loop through results
echo "<tr><td>" . $row['order_id'] . "</td><td>" . $row['student_id'] . "</td><td>" . $row['runner_id'] . "</td><td>" . $row['curdate'] . "</td><td>" . $row['balance'] . "</td><td>" . $row['used'] . "</td><td>" . $row['dininghall'] . "</td><td><form method= 'post' > <input type='hidden' name='remove3' id='remove3' value =". $row['order_id'] . " /> <input type='submit' value = 'delete' id= 'delete3' name='delete3' /> </form></td> </tr>"; 
}

echo "</table>";


}


function updatecustinfo(){
$dbname = "guevarja";
$dbc = connect_to_db($dbname);

$eagleid=$_POST['eagleid'];

$email=$_POST['email'];
$phone=$_POST['phone'];
$dorm=$_POST['dorm'];
$room = $_POST['room'];


$query = "UPDATE `Customers` SET `phone`='$phone',`dorm`='$dorm', `email` = '$email' ,`room`='$room' WHERE `eagle_id`= '$eagleid' ";
$result= perform_Query($dbc, $query);
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=ontheflyadmin.php">';


}

function updateflyerinfo(){
$dbname = "guevarja";
$dbc = connect_to_db($dbname);

$lastname = $_POST['lastname2'];
$email=$_POST['email2'];
$phone=$_POST['phone2'];

$query = "UPDATE `Runners` SET `phone`='$phone',`email`= '$email' WHERE `lastname` = '$lastname' ";
$result= perform_Query($dbc, $query);
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=ontheflyadmin.php">';




}
