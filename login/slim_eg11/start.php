<?php

require '../vendor/autoload.php';

$app= new \Slim\Slim();


$app->get('/:id',function($id){
  $j=0;
  $k=0;
  $x=0;
  $y=0;
  $z=0;
  $l=0;
  $ind=0;
  $cl_id=array();
  $pl_id=array();
  $cl_name=array();
  $arr=array("match_id"=>array(),"club_name1"=>array(),"club_name2"=>array(),"date"=>array());
  $mtch_id=array("match_id"=>array(),"club_name1"=>array(),"club_name2"=>array());
    $linkid=mysql_connect('localhost','root','')or die("Couldnot connect");
    $query="SELECT * FROM personal_team_info where user_id='$id'";
    $result=mysql_db_query('minor_project',$query,$linkid);
    while($row=mysql_fetch_array($result)){
      $pl_id[$j]=$row["player_id"];
      $j++;
    }
    for($ind=0;$ind<11;$ind++){
      $linkid=mysql_connect('localhost','root','')or die("Couldnot connect");
      $query="SELECT club_id FROM player_info where player_id='$pl_id[$ind]'";
      $result=mysql_db_query('minor_project',$query,$linkid);
      while($row=mysql_fetch_array($result)){
          $cl_id[$k]=$row["club_id"];
          $k++;
      }
    }
    //echo json_encode($cl_id);

    for($ind=0;$ind<11;$ind++){
      $linkid=mysql_connect('localhost','root','')or die("Couldnot connect");
      $query="SELECT club_name from club_info where club_id='$cl_id[$ind]'";
       $result=mysql_db_query('minor_project',$query,$linkid);
       while($row=mysql_fetch_array($result)){
        $cl_name[$x]=$row["club_name"];
        $x++;
       }
    }
      //echo json_encode($cl_name);
    $linkid=mysql_connect('localhost','root','')or die("Couldnot connect");
      $query="SELECT * from match_schedule";
   
    $result=mysql_db_query('minor_project',$query,$linkid);
        while($row=mysql_fetch_array($result)){
        $arr["club_name1"][$y]=$row["club_name1"] ;
        $arr["club_name2"][$y]=$row["club_name2"] ;
        $arr["match_id"][$y]=$row["match_id"];
       $arr["date"][$y]=$row["date"] ;
       
          $y++;
      } 
    
   // echo json_encode($cl_name);
    $ind=0;
    //console.log(strlen($arr["club_name1"]));
    for($l=0;$l<sizeof($cl_name);$l++){
      for($z=0;$z<sizeof($arr["club_name1"])/2;$z++){
      
       if((strcmp($arr["club_name1"][$z],$cl_name[$l])==0) or (strcmp($arr["club_name2"][$z],$cl_name[$l])==0) ){
            $mtch_id["match_id"][$ind]=$arr["match_id"][$z];
            $mtch_id["club_name1"][$ind]=$arr["club_name1"][$z];
            $mtch_id["club_name2"][$ind]=$arr["club_name2"][$z];
            $mtch_id["date"][$ind]=$arr["date"][$z];
            $ind++;
                      
        }
                   
      }
    }

    echo json_encode($mtch_id);
   /* for($l=0;$l<sizeof($mtch_id["match_id"]);$l++){
      $linkid=mysql_connect('localhost','root','')or die("Couldnot connect");
      $m_id=$mtch_id["match_id"][$l];
      $query="INSERT INTO user_result VALUES (2,'$m_id')";
   
    $result=mysql_db_query('minor_project',$query,$linkid);
    }
    
  echo json_encode($mtch_id);*/
});

$app->run();



?>