$(() => {

	//2 IN 1 FORMS

	const loginForm = $(".login-form");
	const registerForm = $(".register-form");
	const btn = $("#btn");

	$(".toggle-btn-register").click(() => {
		loginForm.css("margin-left", "-400px");
		registerForm.css("margin-left", "50px");
		btn.css("left", "125px");
	});

	$(".toggle-btn-login").click(() => {
		registerForm.css("margin-left", "400px");
		loginForm.css("margin-left", "50px");
		btn.css("left", "0");
	});

	//MENU MOVEMENT

	const menuBtn = $(".hamburger-menu");
	const menu = $(".menu");
	const closeMenuBtn = $(".close-menu");

	menuBtn.click(() => {
		menu.css("left", "50%");
	});

	closeMenuBtn.click(() => {
		menu.css("left", "100%");
	});

	//COOKIE CREATION

	var sent = true;

	const form = $(".login-form");
	const loginInput = $("#LoginLogin");
	const passwordInput = $("#LoginPassword");

	$(".submitBtn").click((event) => {

		event.preventDefault();

		document.cookie = "username=" + loginInput.val();
		document.cookie = "pswd=" + passwordInput.val();

		form.submit();
	});

	//REMEMBER ME FUNCIONALLITY

	const cookies = document.cookie.split(";");
	var key;
	var value;
	var object = {};

	for (var i = 0; i < cookies.length; i++) {
		key = cookies[i].substr(0, cookies[i].indexOf("="));
		key = key.trim();
		value = cookies[i].split("=").pop();
		object[key] = value;
	}

	//REMOVING CONTACT

	const rmBtn = $('*[data-function="remove-contact"]');

	rmBtn.click(function (event) {
		event.stopPropagation();
		event.stopImmediatePropagation();
		window.location = "remove-contact/" + $(this).attr('id');
	});

	//DISPLAYING MODAL

	const addBtn = $('*[data-function="add-contact"]');

	addBtn.click(function () {
		$(".modalDiv").css("display", "block");
	});

	//CLOSING MODAL

	const closeBtn = $('*[data-function="close-modal"]');

	closeBtn.click(function () {
		$(".modalDiv").css("display", "none");
	});

	//SHOWING CONTACT DETAILS

	const arrow = $(".arrow");
	let opened = false;

	arrow.click(function () {
		if (!opened) {
			//OPEN
			$(this).css("rotate", "180deg");
			$(this).parent().parent().css("height", "360px");
			opened = true;
		} else {
			//CLOSE
			$(this).css("rotate", "90deg");
			$(this).parent().parent().css("height", "50px");
			opened = false;
		}
	});

});
