<?php

require '../vendor/autoload.php';

$app= new \Slim\Slim();


$app->get('/traits/:id',function($id){
  
  $arr=array("player_id"=>array(),"power"=>array(),"stamina"=>array(),"agility"=>array(),"balance"=>array(),"sprint"=>array());
    $linkid=mysql_connect('localhost','root','')or die("Couldnot connect");
    

      $query="SELECT * from player_traits where EXISTS (SELECT club_id from player_info where club_id='$id')";
    $i=0;
    $result=mysql_db_query('minor_project',$query,$linkid);
        while($row=mysql_fetch_array($result)){
        $arr["player_id"][$i]=$row["player_id"] ;
        $arr["power"][$i]=$row["power"] ;
        $arr["stamina"][$i]=$row["stamina"] ;
        $arr["agility"][$i]=$row["agility"] ;
        $arr["balance"][$i]=$row["balance"] ;
          $arr["sprint"][$i]=$row["sprint"] ;
          $i++;
      } 
    
    echo json_encode($arr);
    
  
  
});



$app->get('/ranking/',function(){
  
  $arr=array("club_name"=>array(),"played"=>array(),"won"=>array(),"lost"=>array(),"drawn"=>array(),"points"=>array());
    $linkid=mysql_connect('localhost','root','')or die("Couldnot connect");
    

      $query="SELECT * from team_ranking";
    $i=0;
    $result=mysql_db_query('minor_project',$query,$linkid);
        while($row=mysql_fetch_array($result)){
            $arr["club_name"][$i]=$row["club_name"] ;

        $arr["played"][$i]=$row["played"] ;
        $arr["won"][$i]=$row["won"] ;
        $arr["lost"][$i]=$row["lost"] ;
        $arr["drawn"][$i]=$row["drawn"] ;
        $arr["points"][$i]=$row["points"] ;
          
          $i++;
      } 
    
    echo json_encode($arr);
    
  
  
});


$app->run();



?>