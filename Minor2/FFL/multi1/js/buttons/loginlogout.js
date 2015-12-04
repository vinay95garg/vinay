
var logoutbutton= $('#logout_submit');
var loginbutton= $('#submit');
var registerButton= $('#registerButton');
var SaveLoadOutput= $('#SaveLoadOutput');
var logInForm= $('#LogInForm');
var formcontainer= $('#form_container');
var multiplayersubmit= $('#multiplayer_submit');
multiplayersubmit.show();

$("#logout_submit").click(function()  {

	var test="";
	$.post('php_pages/logout.php',{test:test}),done(function(data) {
		$('#infoSQL').text(data.msg);
		//alert(data.loggedin);
		if(data.loggedin == "false"){
			loginbutton.show();
			logoutbutton.hide();
			registarButton.show();
			SaveLoadOutput.hide();
			logInForm.show() ;

		}
	},
	'json');
});

$("#submit").click(function() {


	var username =$("#username").val();  // id=lMoveSQL  finns i main.php
	var password = $("#password").val();
	var errorMSG = "Wrong username or password";


	//alert("bej");
	$.post('php_pages/checkLogin.php',{username : username,password: password}).done( function(data){


		console.log(data);
		var message=JSON.parse(data);
	$('#infoSQL').text(message["msg"]);	
		console.log(message["msg"]);


		if(message["loggedin"] == "true") {
			//console.log("bhut shi");
			$('#infoSQL').text(data.msg);
			loginbutton.hide();
			logoutbutton.show();
			multiplayersubmit.show();

		}
	});
});





