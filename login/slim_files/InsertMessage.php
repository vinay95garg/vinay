<?php
session_start();
include "../classes/chat.php";
echo "hello";
if(isset($_POST['ChatText'])){
	$chat = new chat();
	$chat->setChatUserId($_SESSION['UserId']);
	$chat->setChatUserId($_SESSION['GameId']);
	$chat->setChatText($_POST['ChatText']);
	//echo $_SESSION['GameId'];
	$chat->InsertChatMessage();
}

?>