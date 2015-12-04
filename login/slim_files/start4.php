<?php
session_start();
$username=$_SESSION['UserName'];
echo json_encode($username);
?>