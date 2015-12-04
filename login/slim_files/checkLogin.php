<?php
session_start();
include_once("../connectToDB.php");

if(isset($_POST['username']))
{	
	//echo "hello";
	$username = $_POST['username'];
	$password = ($_POST['password']);
	$sql = $_db->query("SELECT * FROM users WHERE UserName='$username' AND UserPassword='$password'");
 	//echo $username;
$existCount = $sql->rowCount();
//echo $username;
//echo $existCount;
if ($existCount==0) {
	//echo "bdiya nhi";
	$_SESSION['username'] = false;
	$output = array ('msg'=>'Hello $uname with id $id','loggedin'=>'false');
}

if ($existCount > 0) {
	

	while ($row =$sql->fetch(PDO::FETCH_ASSOC)) {

		//echo "bdiya";
	

		$id = $row["UserId"];
		$uname = $row["UserName"];
		$pword = $row["UserPassword"];
	}

$_SESSION['username'] = $uname;
$_SESSION['userpassword'] = $pword;
	$output = array("msg"=>"Hello $uname! ","loggedin"=>"true");
}

}
echo json_encode($output);


?>