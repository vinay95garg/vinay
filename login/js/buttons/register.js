


$("#register_submit").click(function() 


{ 

	console.log("jfnk");
	var regusername = $("#regusername").val();
	var regpassword = $("#regpassword").val();
	var regpassword_again = $("#regpassword_again").val();


$("#form_container").next().toggle(250);

if(regpassword!= regpassword_again)
{

	console.log("wrong");
	$('#infoSQL').text("cnfh rong");

	regpassword = $("#regpassword").val('');
	regpassword_again = $("#regpassword_again").val('');

}
else
{

//alert("hello");
		$.post('slim_files/register.php',{regusername: regusername,regpassword: regpassword }) .done(function(data)
		{

			console.log(data);
			//console.log(data.msg);
			var message=JSON.parse(data);
			$('#infoSQL').text(message["msg"]);
				console.log(message["msg"]);
				if(message["loggedin"] == "true")
				{
					console.log("hrllo");
						registerButton.hide();
						formcontainer.hide();
						SaveLoadOutput.show();	
						$("#regusername").val('');
						$("#regpassword").val('');
						$("#regpassword_again").val('');	
						$("#name").val('');	
				}


});

}


});

//formcontainer.hide();
$("#registerButton").click(function ()
{
	//console.log("hello");
	formcontainer.toggle();
});