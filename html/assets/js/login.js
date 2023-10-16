"use strict";
$("#loading").hide()
$("#login").click(function(){
	$("#loading").show()
	var username = $("#username").val()
	var password = $("#password").val()
	if(username == ""){
		toastr.error("Username can't be empty")
	}else if(password == ""){
		toastr.error("Password can't be empty")
	}else{
		var settings = {
		  "url": "api/auth",
		  "method": "POST",
		  "timeout": 0,
		  "headers": {
		    "Content-Type": "application/json",
		  },
		  "data": JSON.stringify({
		    "username": username,
		    "password": password
		  }),
		};

		$.ajax(settings).done(function (response) {
			$("#loading").hide()
			if (response.code == 200) {
				localStorage.setItem('key', response.data.key);
				localStorage.setItem('secret', response.data.secret);
				toastr.success(response.message)
				setTimeout(function() {
					window.location.href="/"
				},1500)
			}else{
				toastr.error(response.message)
			}
		});
	}
})

$("#daftar").click(function() {
	var username = $("#username").val()
	var email = $("#email").val()
	var upline = $("#upline").val()
	var password = $("#password").val()
	if(username == ""){
		toastr.error("Username can't be empty")
	}else if(email == ""){
		toastr.error("Email can't be empty")
	}else if(password == ""){
		toastr.error("Password can't be empty")
	}else if(upline == ""){
		toastr.error("Upline can't be empty")
	}else{
		var settings = {
		  "url": "api/register",
		  "method": "POST",
		  "timeout": 0,
		  "headers": {
		    "Content-Type": "application/json",
		  },
		  "data": JSON.stringify({
		    "username": username,
		    "email": email,
		    "upline": upline,
		    "password": password
		  }),
		};

		$.ajax(settings).done(function (response) {
			console.log(response)
			if (response.code == 200) {
				toastr.success(response.message)
				setTimeout(function() {
					window.location.href="/"
				},1500)
			}else{
				toastr.error(response.message)
			}
		});
	}
})