const emailLogin = document.getElementById("emailLogin");
const passwordLogin = document.getElementById("password-login");
const loginForm = document.getElementById("loginForm");

// function to check if field empty
const isRequired1 = (value) => (value === "" ? false : true);

// function to show error
const showError1 = (input, message) => {
	// get the form-field element
	const formField = input.parentElement;
	// add the error class
	formField.classList.remove("success");
	formField.classList.toggle("error");

	// show the error message
	const error = formField.querySelector("small");
	error.textContent = message;
};

// function to show success
const showSuccess1 = (input) => {
	// get the form-field element
	const formField = input.parentElement;

	// remove the error class
	formField.classList.remove("error");
	formField.classList.toggle("success");

	// hide the error message
	const error = formField.querySelector("small");
	error.textContent = "";
};

// function to validate email
const checkEmail1 = () => {
	let valid = false;
	const emailTrimmed = emailLogin.value.trim();
	if (!isRequired1(emailTrimmed)) {
		showError1(emailLogin, "Email cannot be blank.");
	} else {
		showSuccess1(emailLogin);
		valid = true;
	}
	return valid;
};

// function to validate password
const checkPassword1 = () => {
	let valid = false;

	const passwordTrimmed = passwordLogin.value.trim();

	if (!isRequired1(passwordTrimmed)) {
		showError1(passwordLogin, "Password cannot be blank.");
	} else {
		showSuccess1(passwordLogin);
		valid = true;
	}

	return valid;
};

loginForm.addEventListener("submit", function (e) {
	// prevent the form from submitting
	e.preventDefault();

	// validate forms
	let isEmailValid = checkEmail1(),
		isPasswordValid = checkPassword1();

	let isFormValid = isEmailValid && isPasswordValid;

	// submit to the server if the form is valid
	if (isFormValid) {
		const emailLoginValue = emailLogin.value;
		const passwordLoginValue = passwordLogin.value;
		const Err = document.getElementById("err");
		fetch("http://localhost/dokkaneh/ecommerce/signup/includes/login.inc.php", {
			method: "POST",
			headers: {
				"Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
			},
			body: `emailLoginValue=${emailLoginValue}&passwordLoginValue=${passwordLoginValue}`,
		})
			.then((response) => response.text())
			.then((res) => {
				if (res == "index.php" || res == "admin.php") {
					location.href = res;
				} else {
					alert(res);
				}
			});
	}
});