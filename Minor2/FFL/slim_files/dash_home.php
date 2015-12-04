<?php

require '../vendor/autoload.php';

$app= new \Slim\Slim();


$app->get('/',function(){
  
	$arr=array("players_name"=>array(),"player_cost"=>array(),"player_id"=>array(),"rating"=>array(),"club_id"=>array(),"img_url"=>array());
    $linkid=mysql_connect('localhost','root','')or die("Couldnot connect");
    

    	$query="SELECT * from player_info order by rating ";
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

$app->run();



?>