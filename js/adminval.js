
function passval(){
	var pass = document.getElementById("password").value;
	var er1 = document.getElementById("error1");

	if (pass == ""){
		er1.innerHTML= "Enter the password ";

	}

	else {
		er1.innerHTML = ""
	}
 	return false;
}
