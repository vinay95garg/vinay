<?php
session_start();
include "../classes/user.php";
$user=new user();
$user->setUserName($_SESSION['username']);
$user->setUserPassword($_SESSION['userpassword']);
//echo $_SESSION['username'];
//echo $_SESSION['userpassword'];

if($user->UserLogin()==true){
	echo "andar";
	$_SESSION['UserId']=$user->getUserId();
	$_SESSION['UserName']=$_SESSION['username'];
	$_SESSION['GameId']=$user->getUserGameId();
	$_SESSION['Opponent']=$user->getUserGameOpponent();
	echo 	$_SESSION['Opponent'];
	//$_SESSION['Color']=$user->getGameColor();

}


?>
