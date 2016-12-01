<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8" />
 <title>HW1</title>
  <script type="text/javascript" src="js/adminval.js"></script>
</head>
<body style="background-color:lightgrey;">

<form method = "post" > 
	Password  <br><input type= "password" id ="password" onblur = "passval()" name = "password" >  <div id="error1"></div> <br>
	<input type = "submit" name = "login" value = "login" >
		<?php
			if (isset ($_POST['login'] )) {
				 handleform();
			} 
		?> 
</form>

</body>

</html>

<?php


function handleform(){

$pass = $_POST['password'];

if ($pass == "testing"){
 echo '<META HTTP-EQUIV="Refresh" Content="0; URL=ontheflyadmin.php">';    
    exit;  

	}
else{
echo " <script> alert ('try again..') </script>";


}
}
 ?>
