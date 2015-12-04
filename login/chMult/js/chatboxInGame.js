$(document).ready(function() {
	console.log("adar");
	$("#ChatText").keyup(function(e){
		console.log("drfr");
		console.log("kuch bhi");

		if (e.keyCode == 13) {
			console.log("enter");
			var ChatText = $("#ChatText").val();
			$.ajax({
				type:'POST',
				data:{ChatText:ChatText},
				url:'../InsertMessage.php',
				success:function() {
					//console.log("asd");
				$("#ChatText").val("");
				}
			})
		}
	})
	setInterval (function(){
		console.log("hii");
		$("#ChatMessages").load("../DisplayMessagesingame.php");
	},1500)
		$("#ChatMessages").load("../DisplayMessagesingame.php");

});
