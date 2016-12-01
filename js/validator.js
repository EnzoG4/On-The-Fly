


function firstval(){
	var name = document.getElementById("first").value;
	var er1 = document.getElementById("error1");

	if (name == ""){
		er1.innerHTML= "Enter first and last name";

	}

	else {
		er1.innerHTML = ""
	}
 	return false;
}



function lastval(){
	var email = document.getElementById("last").value;
	var er2 = document.getElementById("error2");

	if(email == ""){
		er2.innerHTML = "enter email";
	}
	else{
		er2.innerHTML = "";
	}
 return false;
 

}

function IDval(){
	var email = document.getElementById("id").value;
	var er3 = document.getElementById("error3");

	if(email == ""){
		er3.innerHTML = "enter email";
	}
	else{
		er3.innerHTML = "";
	}
 return false;
 

}
function emailval(){
	var email = document.getElementById("email").value;
	var er4 = document.getElementById("error4");

	if(email == ""){
		er4.innerHTML = "enter email";
	}
	else{
		er4.innerHTML = "";
	}
 return false;
 

function phoneval(){
	var email = document.getElementById("phone").value;
	var er5 = document.getElementById("error5");

	if(email == ""){
		er5.innerHTML = "enter email";
	}
	else{
		er5.innerHTML = "";
	}
 return false;
 

}


function passval3(){
	var pass1 = document.getElementById("pass1").value;
	var er6 = document.getElementById("error6");

	if(pass1 == ""){
		er6.innerHTML = "password is too short";
	}
	else{
		er6.innerHTML = "";
	}
 return false;
}

function passval4(){
	var pass1 = document.getElementById("pass1").value;
	var pass2 = document.getElementById("pass2").value;
	var er7 = document.getElementById("error7");

 
	if(pass2 != pass1){
		er7.innerHTML = "passwords do not match";
	}
	else{
		er7.innerHTML = "";
	 }
 return false;
}
