  <?php

session_start();
include "../classes/user.php";
$user=new user();
if($_SESSION['GameId']!=0){
	$user->DeleteGame($_SESSION['Game_Id']);
	$_SESSION['GameId']="";
}



?>

<!DOCTYPE html>
<html lang="en">
<META HTTP_EQUIV=Refresh;>
<head>
	<link rel="stylesheet" href="../style/style.css">
	
		<script src="../js/jquery.js"></script>
		<script src="../js/ap.js"></script>

		<script src="../js/chatbox.js"></script>
	<title>Chat Application Home</title>
</head>	
<body>
	<h2>Welcome<span style="color:green">
		<?php
		//echo "heklo";
			echo $_SESSION['UserName'];
		?></span></h2>


		<div id="AvailablePlayers">
		</div>

		<div id="ChatMessages">
		</div>

		<div id="chatBig">
			<textarea id="ChatText" name="ChatText"></textarea>
		</div>


	</body>
	</html>