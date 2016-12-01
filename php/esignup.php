<?php
display();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>sign up page</title>
	 <link rel= "stylesheet" type= "text/css" href= "css/hw10.css"/>
	 <script type="text/javascript" src="js/passwordval.js"></script>
</head>
<body>
<fieldset>
		<?php
			//if (isset ($_POST['join'] )) {
				 //handleform();
			//} 
		?> 
</fieldset>
</body>
</html>

<?php
function display(){

?>
<form method = "post" name = 'login' id= "field" >
<?php
	echo "Name <br><input type= 'text' name = 'name1' id = 'nameval' onblur = 'passval()'> <div id='error1'></div> <br>" ; 
	echo "Email <br><input type= 'text' name = 'email' id = 'email1val' onblur = 'passval2()'> <div id='error2'></div> <br> ";
	echo "Password  <br><input type= 'password' name = 'password' id = 'pass1val'  onblur = 'passval3()'>  <div id='error3'></div><br>";
	echo "Password again <br><input type= 'password' name = 'password2'  id = 'pass2val' onblur = 'passval4()'>  <div id='error4'></div><br>";
?>
	<input type = "submit" name = "join" value = "join"> 
	</form>
<?php }
?>
	 <form method="get">
	 <a href="employee.php">Go to employee page and log in </a>	
	</form>
	
	
	
	
<?php
function handleform(){
include ("dbconn.php");
$dbname = "kimaxm";
$dbc = connectToDB($dbname);

	
	
$name = $_POST['name1'];
$email = $_POST['email'];
$password1 = $_POST['password'];
$password2 = $_POST['password2'];
$member = $_POST['member'];


$query = "select * FROM `club 2` WHERE `email` = '$email'";
$result= performQuery($dbc, $query); 




if($pass= mysqli_fetch_array($result, MYSQLI_ASSOC)){
	die("This email already exists");
}
else if($password1 !== $password2){
	die( "Passwords do not match");
	}
	
else{ 
	$query = "INSERT INTO `club 2`(`name1`, `email`, `password`, `registration date`, `membership type` )VALUES ('$name', '$email' ,sha1('$password1') ,now(),'$member')";
	performQuery($dbc, $query);
	
	echo "Your account has been made";

 }
	
disconnectFromDB($dbc, $result);
}

?>



	
