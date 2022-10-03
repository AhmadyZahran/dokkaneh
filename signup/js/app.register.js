const fullname = document.getElementById("name-registration");
const email = document.getElementById("email-registration");
const phone = document.getElementById("phone-registration");
const password = document.getElementById("password-registration");
const passwordConfirm = document.getElementById("password-confirm-registration");

const form = document.getElementById("registrationForm");

// verification functions

// function to check if field empty
const isRequired = (value) => (value === "" ? false : true);

// function to verify email
const isEmailValid = (email) => {
	const re =
		/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return re.test(email);
};
// function to verify password
const isPasswordSecure = (password) => {
	const re = new RegExp(
		"^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*])(?=.{8,})"
	);

	return re.test(password);
};


// function to verify if name is text
const isText = (inputName) => {
	const re = new RegExp("^[A-Za-z]*");
	return re.test(inputName);
};
// function to verify phone number
const isNum = (inputName) => {
	const re = new RegExp("\\d{10}");
	return re.test(inputName);
};

// function to show error
const showError = (input, message) => {
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
const showSuccess = (input) => {
	// get the form-field element
	const formField = input.parentElement;

	// remove the error class
	formField.classList.remove("error");
	formField.classList.toggle("success");

	// hide the error message
	const error = formField.querySelector("small");
	error.textContent = "";
};

// function to check if name is text
const checkName = () => {
	let valid = false;
	const username = fullname.value.trim();

	if (!isRequired(username)) {
		showError(fullname, "Name cannot be blank.");
	} else if (!isText(username)) {
		showError(fullname, `Name must be only text.`);
	} else {
		showSuccess(fullname);
		valid = true;
	}
	return valid;
};
// function to validate phone
const checkPhone = () => {
	let valid = false;
	const phoneTrimmed = phone.value.trim();
	if (!isRequired(phoneTrimmed)) {
		showError(phone, "Phone cannot be blank.");
	} else if (!isNum(phoneTrimmed)) {
		showError(phone, "Phone must be 10 digits.");
	} else {
		showSuccess(phone);
		valid = true;
	}
	return valid;
};

// function to validate email
const checkEmail = () => {
	let valid = false;
	const emailTrimmed = email.value.trim();
	if (!isRequired(emailTrimmed)) {
		showError(email, "Email cannot be blank.");
	} else if (!isEmailValid(emailTrimmed)) {
		showError(email, "Email is not valid.");
	} else {
		showSuccess(email);
		valid = true;
	}
	return valid;
};

// function to validate password
const checkPassword = () => {
	let valid = false;

	const passwordTrimmed = password.value.trim();

	if (!isRequired(passwordTrimmed)) {
		showError(password, "Password cannot be blank.");
	} else if (!isPasswordSecure(passwordTrimmed)) {
		showError(
			password,
			"Password must has at least 8 characters that include at least 1 lowercase character, 1 uppercase characters, 1 number, and 1 special character in (!@#$%^&*)"
		);
	} else {
		showSuccess(password);
		valid = true;
	}

	return valid;
};

// function to confirm password
const checkConfirmPassword = () => {
	let valid = false;
	// check confirm password
	const confirmPassword = passwordConfirm.value.trim();
	const passwordTrimmed = password.value.trim();

	if (!isRequired(confirmPassword)) {
		showError(passwordConfirm, "Please enter the password again");
	} else if (passwordTrimmed !== confirmPassword) {
		showError(passwordConfirm, "Confirm password does not match");
	} else {
		showSuccess(passwordConfirm);
		valid = true;
	}

	return valid;
};

form.addEventListener("submit", function (e) {
	// prevent the form from submitting
	e.preventDefault();

	// validate forms
	let isNameValid = checkName(),
		ischeckPhone = checkPhone(),
		isEmailValid = checkEmail(),
		isPasswordValid = checkPassword(),
		isConfirmPasswordValid = checkConfirmPassword();

	let isFormValid =
		isNameValid &&
		ischeckPhone &&
		isEmailValid &&
		isPasswordValid &&
		isConfirmPasswordValid;

	// submit to the server if the form is valid
	if (isFormValid) {
		const nameValue = fullname.value;
		const emailValue = email.value;
		const phoneValue = phone.value;
		const passwordValue = password.value;

		fetch("http://localhost/dokkaneh/ecommerce/signup/includes/register.inc.php", {
			method: "POST",
			headers: {
				"Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
			},
			body: `nameValue=${nameValue}&emailValue=${emailValue}&phoneValue=${phoneValue}&passwordValue=${passwordValue}`,
		})
			.then((response) => response.text())
			.then((res) => {
				if (res == "index.php") {
					location.href = res;
				} else {
					alert(res);
				}
			});
	}
});
