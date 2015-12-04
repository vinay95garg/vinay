<?php
if(!session_id()) session_start();

	//echo "gelwf";
	$dbhost = "localhost";
	$dbname = "minor_project";
	$dbuser = "root";
	$dbpass = "";

	
	try{
		$_db = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass, array(
		//echo "hello";	
		PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",

		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_PERSISTENT => true	
		
		));

	}


catch(Exception $e){

	die("ERROR :".$e->getMessage());
}
?>