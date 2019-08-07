function validate_reg_form() {
		let errors = 0;
		let firstname = document.querySelector('#firstName').value;
		let lastname = document.querySelector('#lastName').value;
		let email = document.querySelector('#email').value;
		let add = document.querySelector('#add').value;
		let username = document.querySelector('#username').value;
		let password = document.querySelector('#password').value;
		let confirmPassword = document.querySelector('#confirmPassword').value;

		if(firstname.length < 1) {
			document.querySelector('#firstErr').innerHTML = 'First name should be atleast 1 character';
			errors++;
		} else {
			document.querySelector('#firstErr').innerHTML = '';
		}

		if(lastname.length < 1) {
			document.querySelector('#lastErr').innerHTML = 'Last name should be atleast 1 character';
			errors++
		} else {
			document.querySelector('#lastErr').innerHTML = ''
		}

		if(password.length < 8) {
			document.querySelector('#passErr').innerHTML = 'Please enter 8 or more characters';
			errors++
		} else {
			document.querySelector('#passErr').innerHTML = '';
		}

		if(password !== confirmPassword) {
			document.querySelector('#pass2Err').innerHTML = 'Passwords do not match'
			errors++
		} else {
			document.querySelector('#pass2Err').innerHTML = ''
		}

		if(email == ""){
			document.querySelector("#emailErr").innerHTML = "Please provide valid email"
			errors++;

		} else{
			document.querySelector("#emailErr").innerHTML = "";
		}	
		
		if(username < 8){
			document.querySelector("#usernameErr").innerHTML = "Please enter 8 or more characters"
			errors++;

		} else{
			document.querySelector("#usernameErr").innerHTML = "";
		}	

		if(add == ""){
			document.querySelector("#addErr").innerHTML = "Please provide your address"
			errors++;

		} else{
			document.querySelector("#addErr").innerHTML = "";
		}

		if (errors > 0) {
			return false;
		} else {
			return true;
		}
	};

document.querySelector('#sub').addEventListener("click", () => {

	if(validate_reg_form()) {
	
	let firstname = document.querySelector('#firstName').value;
	let lastname = document.querySelector('#lastName').value;
	let email = document.querySelector('#email').value;
	let add = document.querySelector('#add').value;
	let username = document.querySelector('#username').value;
	let password = document.querySelector('#password').value;
	let confirmPassword = document.querySelector('#confirmPassword').value;
	
	let data = new FormData();
	// console.log(data);
	data.append("firstname", firstname);
	data.append("lastname", lastname);
	data.append("email", email);
	data.append("add", add);
	data.append("username", username);
	data.append("password", password);

	fetch('../controllers/create_user.php', {
		method: 'POST',
		body: data
	})

	.then(function(response) {
		return response.text();
	})

	.then(function(data_from_fetch){
		if(data_from_fetch == "user_exists"){
				document.querySelector('#insertErr').innerHTML = "User already exists";
			} else {
				window.location.replace("../views/home.php");
			}

	})

	}

})