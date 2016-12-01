function passval(){
	var name = document.getElementById("nameval").value;
	var er1 = document.getElementById("error1");

	if (name == ""){
		er1.innerHTML= "Enter first and last name";

	}

	else {
		er1.innerHTML = ""
	}
 	return false;
}
