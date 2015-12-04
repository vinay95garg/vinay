<?php

require '../vendor/autoload.php';

$app= new \Slim\Slim();

$app->get('/',function(){
$arr=array("news"=>array(),"url"=>array());
$i=0;
$linkid=mysql_connect('localhost','root','')or die("Couldnot connect");
		$query="SELECT * from news";
		$result=mysql_db_query('minor_project',$query,$linkid);
		while($row=mysql_fetch_array($result)){
			 $arr["news"][$i]=$row["news"] ;
		    $arr["url"][$i]=$row["urls"] ;
		    $i++;
		}
		echo json_encode($arr);
	



});



$app->run();

?>