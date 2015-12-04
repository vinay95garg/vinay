<?php
session_start();
include "../classes/multiuser.php";
$user=new user();
//echo "display";
$user->DisplayAvailablePlayers();
?>
