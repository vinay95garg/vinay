<?php
session_start();
require '../vendor/autoload.php';

$app= new \Slim\Slim();


$app->get('/',function(){
  
	$arr1=array("user_id"=>array(),"player_id"=>array());
    $linkid=mysql_connect('localhost','root','')or die("Couldnot connect");
    

    $uname=$_SESSION['username'];

    	$query1="SELECT * from substitutes  where user_id = '$uname'";
    $i=0;
    $result=mysql_db_query('minor_project',$query1,$linkid);
    if (!$result) { // add this check.
    die('Invalid query: ' . mysql_error());
}
        while($row1=mysql_fetch_array($result)){
		    $arr1["user_id"][$i]=$row1["user_id"] ;
		    $arr1["player_id"][$i]=$row1["player_id"] ;
		         		$i++;
    	
    
  }
  $arr=array("players_name"=>array(),"player_cost"=>array(),"player_id"=>array(),"rating"=>array(),"club_id"=>array(),"img_url"=>array());
    $linkid=mysql_connect('localhost','root','')or die("Couldnot connect");
    

      $query="SELECT * from player_info ";
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



    $arr3=array("players_name"=>array(),"player_cost"=>array(),"player_id"=>array(),"rating"=>array(),"club_id"=>array(),"img_url"=>array());
    for($j=0;$j<4;$j++){
      for($i=0;$i<132;$i++){
      if( $arr1["player_id"][$j]==$arr["player_id"][$i])
      {
              $arr3["players_name"][$j]=$arr["players_name"][$i] ;
        $arr3["player_cost"][$j]=$arr["player_id"][$i];
        $arr3["player_id"][$j]=$arr["player_cost"][$i];
        $arr3["rating"][$j]=$arr["rating"][$i] ;
        $arr3["club_id"][$j]=$arr["club_id"][$i] ;
           $arr3["img_url"][$j]=$arr["img_url"][$i];

      }
    }
  }
    echo json_encode($arr3);
        
    
    
  
  
});



$app->run();



?>