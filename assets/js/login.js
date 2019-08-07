document.querySelector('#login').addEventListener("click", () => {
	let username = document.querySelector('#username').value;
	let password = document.querySelector('#password').value;
	
	let data = new FormData();
	// console.log(data);
	data.append("username", username);
	data.append("password", password);
	// console.log(...data)

	//syntax: fetch(url,options)

	fetch('../controllers/authenticate.php', {
		method: 'POST',
		body: data
	})

	.then(function(response) {
		// console.log(response);
		//format the response
		return response.text();
	})

	.then(function(data_from_fetch){
		// console.log(data_from_fetch);
		if(data_from_fetch == "login_failed") {
			document.querySelector('#username').nextElementSibling.innerHTML = 'Please provide correct credentials';
		} else {
				window.location.replace("../views/home.php");
		}
	})

})