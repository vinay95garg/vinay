<?php
session_start();
//echo "hello";
include "../classes/chat.php";
//echo "hello";
//echo $_SESSION['UserId'];
//echo $_SESSION['GameId'];
if(isset($_POST['ChatText'])){
	//echo "hello";
	$chat = new chat();
	$chat->setChatUserId($_SESSION['UserId']);
	$chat->setChatGameId($_SESSION['GameId']);
	$chat->setChatText($_POST['ChatText']);
	$chat->InsertChatMessage();
}

?>