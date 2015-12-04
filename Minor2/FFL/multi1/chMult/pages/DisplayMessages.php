<?php
session_start();
//echo "hello";
include "../classes/chat.php";
//echo "hello";
//echo $_SESSION['UserId'];
//echo $_SESSION['GameId'];

	//echo "hello";
	$chat = new chat();
	$chat->setChatUserId($_SESSION['UserId']);
	$chat->setChatGameId($_SESSION['GameId']);
	$chat->DisplayMessage();


?>