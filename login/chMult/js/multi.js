$(document).ready(function() {
	console.log("adar");
	$("#select15").click(function(e){
		//var temp = document.getElementById("#select15").rows[i].cells[j].innerHTML;

//alert(temp);
		console.log("drfr");
		console.log("yes");
		
		var ChatText = $("#select15").text();
			console.log(ChatText);
			$.ajax({
				type:'POST',
				url:'../InsertMessage.php',
				data:{ChatText:ChatText},
				success:function() {
					//console.log("asd");
				$("#ChatText").val("");
				}
			})
		
	})
/*	setInterval (function(){
		console.log("hii");
		$("#ChatMessages").load("../DisplayMessages.php");
	},1500)
		$("#ChatMessages").load("../DisplayMessages.php");*/

});
