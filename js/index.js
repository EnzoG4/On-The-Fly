function validateForm(){
	var first = document.forms['createForm']['firstname'].value;
	var last = document.forms['createForm']['lastname'].value;
	var email = document.forms['createForm']['email'].value;
	var phone = document.forms['createForm']['phone'].value;
	var password = document.forms['createForm']['password'].value;
	var password1 = document.forms['createForm']['password1'].value;
	var room = document.forms['createForm']['room'].value;
	var eagle_id = document.forms['createForm']['eagleID'].value;

	if (first.trim() == "" || first == null){
		return false;
	}

	else if (last.trim() == "" || last == null){
		return false;
	}

	else if (email.trim() == "" || email == null){
		return false;
	}

	else if (phone.trim() == "" || phone == null){
		return false;
	}

	else if (password.trim() == "" || password == null || password.length <8){
		return false;
	}
	else if (password1.trim() == "" || password1 == null){
		return false;
	}
	else if (password != password1){
		return false;
	}
	else if (room.trim() == "" || room == null){
		return false;
	}
	else if (eagle_id.trim() == "" || eagle_id == null || eagle_id.length <8){
		return false;
	}
	return true;
}

function firstValidation(){
	var first = document.forms['createForm']['firstname'].value;
	var firstError = document.getElementById("firstError");
	if (first.trim() == "" || first == null){
		firstError.innerHTML = "<p>Please enter your first name</p>";
	}
	else if (first.trim() != "" || first != null){
		firstError.innerHTML = "<p></p>";
	}
}

function lastValidation(){
	var last = document.forms['createForm']['lastname'].value;
	var lastError = document.getElementById("lastError");
	if (last.trim() == "" || last == null){
		lastError.innerHTML = "<p>Please enter your last name</p>";
	}
	else if (last.trim() != "" || last != null){
		lastError.innerHTML = "<p></p>";
	}
}

function emailValidation(){
	var email = document.forms['createForm']['email'].value;
	var emailError = document.getElementById("emailError");
	var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (re.test(email) == false){
    	emailError.innerHTML = "<p>Please enter a valid email</p>";
	}
	else{
		emailError.innerHTML = "<p></p>";
	}
}
function phoneValidation(){
	var phone = document.forms['createForm']['phone'].value;
	var desired = phone.replace(/[^\w\s]/gi, '');
	var phoneError = document.getElementById("phoneError");
	if (desired.trim() == "" || desired == null){
		phoneError.innerHTML = "<p>Please enter the phone number</p>";
		return false;
	}
	if (desired.length > 11 || desired.length < 10){
		phoneError.innerHTML = "<p>Please enter a valid number (10 or 11 digits)</p>";
		return false;
	}
	else {
		phoneError.innerHTML = "<p></p>";
	}
}

function passwordValidation(){
	var password = document.forms['createForm']['password'].value;
	var passError = document.getElementById('passError');
	if (password.trim() == "" || password == null){
		passError.innerHTML = "<p>Please enter a password</p>";
	}
	else if (password.length < 8){
		passError.innerHTML = "<p>Your password must have a length of 8 characters</p>";
	}
	else{
		passError.innerHTML = "<p></p>";
	}
}

function passwordValidation1(){
	var password = document.forms['createForm']['password'].value;
	var password1 = document.forms['createForm']['password1'].value;
	var passError1 = document.getElementById("passError1");
	if (password1.trim() == ""|| password1 == null){
		passError1.innerHTML = "<p>Please confirm your password</p>";
	}
	else if (password1 != password){
		passError1.innerHTML = "<p>Passwords entered do not match</p>";
	}
	else{
		passError1.innerHTML = "<p></p>"
	}
}

function roomValidation(){
	var room = document.forms['createForm']['room'].value;
	var roomError = document.getElementById('roomError');
	if (room.trim() == "" || room == null){
		roomError.innerHTML = "<p>Please enter your room number";
	}
	else {
		roomError.innerHTML = "<p></p>";
	}
}
function eagleIDError(){
	var eagleID = document.forms['createForm']['eagleID'].value;
	var eagleIDError = document.getElementById('eagleIDError');
	if (eagleID.trim() == "" || eagleID == null){
		eagleIDError.innerHTML = "<p>Please enter your Eagle ID</p>";
	}
	else if (eagleID.length < 8){
		eagleIDError.innerHTML = "<p>Please enter a valid Eagle ID</p>";
	}
	else{
		eagleIDError.innerHTML = "<p></p>";
	}
}