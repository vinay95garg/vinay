$(document).ready(function(){
	//console.log("hello");
		setInterval (function(){
			$("#AvailablePlayers").load("DisplayPlayers.php");
		},1500);
		$("#AvailablePlayers").load("DisplayPlayers.php");
	});