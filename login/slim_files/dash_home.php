<?php
session_start();
require '../vendor/autoload.php';

$app= new \Slim\Slim();

$app->get('/',function(){

echo "value";
});

$app->get('/:id',function($id){
  
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


$app->post('/formation',function() use ($app){
 $linkid=mysql_connect('localhost','root','')or die("Couldnot connect");
 $app->response()->header("Content-Type", "application/json");
    $json=$app->request->getBody();
   $data=json_decode($json,true);

   /* $data1=$request->post('def_form');
    $data2=$request->post('mf_form');
    $data3=$request->post('at_form');*/
    
   //  $query="INSERT INTO formation values(2,'$data[$i]','$data[$j],'$data[$k]')";
$uname=$_SESSION['username'];

    $query="INSERT INTO formation (user_id,defender,midfielder,attacker) values ('$uname','$data[0]','$data[1]','$data[2]')";
      $result=mysql_db_query('minor_project',$query,$linkid);

    

  
    /*for($i=0;$i<4;$i++){
     //console.log($data);
     $query="INSERT INTO formation values(2,'$data[$i]')";
      $result=mysql_db_query('minor_project',$query,$linkid);
    }*/
    //echo $data1;
    echo json_encode($data);

});

$app->get('/formation/:id',function($id){
  
  $form_arr=array("user_id"=>array(),"defender"=>array(),"midfielder"=>array(),"attacker");
    $linkid=mysql_connect('localhost','root','')or die("Couldnot connect");
    

      $query="SELECT * from formation where user_id='$id'";
    $i1=0;
    $result=mysql_db_query('minor_project',$query,$linkid);
        while($row=mysql_fetch_array($result)){
        $form_arr["user_id"][$i1]=$row["user_id"] ;
        $arr["defender"][$i1]=$row["defender"] ;
        $arr["midfielder"][$i1]=$row["midfielder"] ;
        $arr["attacker"][$i1]=$row["attacker"] ;
        
          $i1++;
      } 
    
    echo json_encode($arr);
    
  
  
});

$app->run();



?>