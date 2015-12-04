<?php
session_start();
$opponent=$_SESSION['Opponent'];
echo json_encode($opponent);
?>