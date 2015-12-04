<?php
session_start();
include "../classes/user.php";
$user=new user();
echo "display";
$user->DisplayAvailablePlayers();
?>