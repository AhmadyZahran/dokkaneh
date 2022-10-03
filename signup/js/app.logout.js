const logout = document.getElementById("logout");
const loggedEmail = document.getElementById("loggedEmail").innerText;

logout.addEventListener("click", (e) => {
	e.preventDefault();
	console.log(loggedEmail);
	fetch("http://localhost/dokkaneh/signup/includes/logout.inc.php", {
		method: "POST",
		headers: {
			"Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
		},
		body: `loggedEmail=${loggedEmail}`,
	})
		.then((response) => response.text())
		.then((res) => (location.href = res));
});
