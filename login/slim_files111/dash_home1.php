<?php
session_start();
require '../vendor/autoload.php';

$app= new \Slim\Slim();


$app->get('/player/:id',function($id){
// $app->get('/:id',function($id){
  
	$arr=array("players_name"=>array(),"player_cost"=>array(),"player_id"=>array(),"rating"=>array(),"club_id"=>array(),"img_url"=>array());
    $linkid=mysql_connect('localhost','root','')or die("Couldnot connect");
    

    	$query="SELECT * from player_info where type_id='$id'";
    $i=0;
    $result=mysql_db_query('minor_project',$query,$linkid);
        while($row=mysql_fetch_array($result)){
		    $arr["players_name"][$i]=$row["players_name"] ;
		    $arr["player_cost"][$i]=$row["player_cost"] ;
		    $arr["player_id"][$i]=$row["player_id"] ;
		    $arr["rating"][$i]=$row["rating"] ;
		    $arr["club_id"][$i]=$row["club_id"] ;
      		$arr["img_url"][$i]=$row["img_url"] ;
      		$i++;
    	}	
    
  	echo json_encode($arr);
    
  
  
});

$app->post('/playing11',function() use ($app){
 $linkid=mysql_connect('localhost','root','')or die("Couldnot connect");
 $app->response()->header("Content-Type", "application/json");
    $json=$app->request->getBody();
    $data=json_decode($json,true);
    for($i=0;$i<11;$i++){
     //console.log($data);
    	$uname=$_SESSION['username'];
     $query="INSERT INTO personal_team_info values('$uname','$data[$i]')";
      $result=mysql_db_query('minor_project',$query,$linkid);
    }

});

$app->post('/sub',function() use ($app){
 $linkid=mysql_connect('localhost','root','')or die("Couldnot connect");
 $app->response()->header("Content-Type", "application/json");
    $json=$app->request->getBody();
    $data=json_decode($json,true);
    for($i=0;$i<4;$i++){
     //console.log($data);
    	$uname=$_SESSION['username'];

     $query="INSERT INTO substitutes values('$uname','$data[$i]')";
      $result=mysql_db_query('minor_project',$query,$linkid);
    }

});



$app->run();



?>