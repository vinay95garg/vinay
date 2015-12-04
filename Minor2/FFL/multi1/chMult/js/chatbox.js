$(document).ready(function() {
	console.log("adar");
	$("#ChatText").keyup(function(e){
		console.log("drfr");
		if (e.keyCode == 13) {
			console.log("enter");
			var ChatText = $("#ChatText").val();
			$.ajax({
				type:'POST',
				url:'InsertMessage.php',
				data:{ChatText:ChatText},
				success:function() {
					//console.log("asd");
				$("#ChatText").val("");
				}
			})
		}
	})
	setInterval (function(){
		console.log("hii");
		$("#ChatMessages").load("DisplayMessages.php");
	},1500)
		$("#ChatMessages").load("DisplayMessages.php");

});
