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

	//MAKING CONTACT FAVOURITE

	const favBtn = $('*[data-function="favourite-contact"]');

	favBtn.click(function (event) {
		event.stopPropagation();
		event.stopImmediatePropagation();
		window.location = "favourite-contact/" + $(this).attr('id');
		$(this).css("color", "yellow");
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

	let div = $("*[data-function='openContact']");

	div.click(function () {
		$(this).children().each(function () {
			$(this).children().not(".createdDate").click(function (e) {
				e.stopPropagation();
			})
		})

		div.not($(this)).removeClass("open");
		$(this).toggleClass("open");
		if(div.hasClass("open"))
			$(".contacts").addClass("openContactsList");	
		else	
			$(".contacts").removeClass("openContactsList");	

	});

	//LIVE CONTACS SEARCH

	let searchInput = $("#query");

	searchInput.keyup(function () {
		$(".searchedContacts").children().remove();
		let value = searchInput.val();
		if(value.trim() !== "") {
			$.ajax({
				url: 'http://localhost/Phonebook/Vendor/cakephp/cakephp/search/'+value,
				type: 'GET',
				dataType: 'json',
				error: function (request, status, error) {

				}
			}).done(function (data) {
				for(var i = 0; i < data.length; i++) {
					$(".searchedContacts").append("<div class='searched'><a href='skype:"+data[i].Contact.number+"?call'>"+data[i].Contact.name+"</a></div>");
				}
			}).always(function () {

			}).fail(function () {

			});
		}
	});	

});
