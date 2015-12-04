<?php

session_start();
include "../../connectToDB.php";
$token=$_GET["id"];
$UserName=$_SESSION['UserName'];
$_SESSION['GameId']=$token;
$opponent=$_GET['name'];
$_SESSION['Opponent']=$opponent;
//echo $_SESSION[$Opponent];
$GameOnReq=$_db->prepare("SELECT * FROM users WHERE UserId=:UserId");
$GameOnReq->execute(array('UserId'=>$_SESSION['UserId']));
$existCount=$GameOnReq->rowCount();
if ($existCount==0){
	return "Tom";
}

if ($existCount>0){
	while($rowGameOn=$GameOnReq->fetch()){
		if($rowGameOn["GameId"]==0){
			$color="white";
			$GameIdInsert=$_db->prepare("UPDATE users SET GameId=?,GameOpponent=? WHERE UserName=?");
			$GameIdInsert->execute(array($token,$opponent,$UserName));
			$color="black";
			$GameIdInsertOpp=$_db->prepare("UPDATE users SET GameId=?,GameOpponent=? WHERE UserName=?");
			$GameIdInsertOpp->execute(array($token,$UserName,$opponent));

		}
	}
}
header("Location: ch/index.php");
?>