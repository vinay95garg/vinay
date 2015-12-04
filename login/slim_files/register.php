
<?php


$linkid=mysql_connect('localhost','root','')or die("Couldnot connect");



if(isset($_POST['regusername']))
{
	//console.log(regusername);
	//echo "nuj";
	$username = $_POST['regusername'];
	$password = ($_POST['regpassword']);
	   
$query1= "INSERT INTO users (UserName,UserPassword) VALUES ('$username','$password')";

$result=mysql_db_query('minor_project',$query1,$linkid);
			$_SESSION['username'] = $username;
	$output = array("msg"=>"Hello $username you are now registered!","loggedin"=>"true");
}
 	echo json_encode($output);

?>

 
 	

