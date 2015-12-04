<?php
//$user=new user(); 
class user{
	private $UserId,$UserName,$UserMail,$UserGameId,$UserPassword,$UserGameColor,$UserGameOpponent;
	public function getUserId(){
		return $this->UserId;
	}
	public function setUserId($UserId){
		return $this->UserId=$UserId;
	}
	public function getUserName(){
		return $this->UserName;
	}
	public function setUserName($UserName){
		return $this->UserName=$UserName;
	}
	public function getUserMail(){
		return $this->UserMail;
	}
	public function setUserMail($UserMail){
		return $this->UserMail=$UserMail;
	}
	public function getUserPassword(){
		return $this->UserPassword;
	}
	public function setUserPassword($UserPassword){
		return $this->UserPassword=$UserPassword;
	}
	public function getUserGameId(){
		return $this->UserGameId;
	}
	public function setUserGameId($UserGameId){
		return $this->UserGameId=$UserGameId;
	}
	public function getUserGameOpponent(){
		return $this->UserGameOpponent;
	}
	public function setUserGameOpponent($UserGameOpponent){
		return $this->UserGameOpponent=$UserGameOpponent;
	}


	public function InsertUser(){

		include "../../connectToDB.php";


					//echo "hello";
	$UserInsert=$_db->prepare("INSERT INTO users  (UserName,UserPassword) VALUES (:UserName,:UserPassword)");
		//$linkid=mysql_connect('localhost','root','')or die("Couldnot connect");
		//$query1= "INSERT INTO users (UserName,UserPassword) VALUES ('$username','$password')";

      // $result=mysql_db_query('minor_project',$query1,$linkid);

		
		$UserInsert->execute(array('UserName'=>$this->getUserName(),
								    'UserPassword'=>$this->getUserPassword()
								    ));
	/*	$linkid=mysql_connect('localhost','root','')or die("Couldnot connect");
		$chatInsert=$_db->prepare("INSERT INTO  chats (ChatUserId,chatGameId,ChatText) VALUES (:ChatUserId,:chatGameId,:ChatText)");
		
		/*$query1= "INSERT INTO users (UserName,UserPassword) VALUES ({$_SESSION['username']},{$_SESSION['userpassword']})";

       $result=mysql_db_query('minor_project',$query1,$linkid);*/

		
	/*	$result->execute(array('UserName'=>$this->getUserName(),
								    'UserPassword'=>$this->getUserPassword()
								    ));*/

	}

	public function DisplayAvailablePlayers(){
		//$linkid=mysql_connect('localhost','root','')or die("Couldnot connect");
		$arr1=array("user_id"=>array(),"player_id"=>array());
    $linkid=mysql_connect('localhost','root','')or die("Couldnot connect");
    
$uname=$_SESSION['username'];
    	$query1="SELECT * from personal_team_info  where user_id = '$uname'";
    $i=0;
    $result=mysql_db_query('minor_project',$query1,$linkid);
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
    for($j=0;$j<11;$j++){
      for($i=0;$i<132;$i++){
      if( $arr1["player_id"][$j]==$arr["player_id"][$i])
      {
              $arr3["players_name"][$j]=$arr["players_name"][$i] ;
        $arr3["player_cost"][$j]=$arr["player_id"][$i];
        $arr3["player_id"][$j]=$arr["player_cost"][$i];
        $arr3["rating"][$j]=$arr["rating"][$i] ;
        $arr3["club_id"][$j]=$arr["club_id"][$i] ;
           $arr3["img_url"][$j]=$arr["img_url"][$i];


         /*   ?>
		  			<span style="color:red" class="UserNames"><?php echo $arr3["players_name"][$j];?>
		  			</span>
		  			<span style="color:red" class="UserNames"><?php echo $arr3["player_cost"][$j];?>
		  			</span>
		  			<span style="color:red" class="UserNames"><?php echo $arr3["player_id"][$j];?>
		  			</span></br>
		  			<?php*/
	
   

      }
          if($arr1["player_id"][$j]==0)
     {
       $arr3["players_name"][$j]="" ;
        $arr3["player_cost"][$j]="";
        $arr3["player_id"][$j]="";
        $arr3["rating"][$j]="" ;
        $arr3["club_id"][$j]="" ;
           $arr3["img_url"][$j]="";


     }
    }
  }


        
     echo json_encode($arr3);
    
  
  


}



public function DeleteGame($id)
{
	include "../../connectToDB.php";
	$token=0;
	$ChatReq=$_db->query("SELECT * FROM chats ORDER BY ChatId");
	 $existCount = $ChatReq->rowCount();
	if($existCount==0)
	{
			//echo $existCount = $ChatReq->rowCount();
		return "Tom";
	}

	if($existCount >0)
	{
			//echo $existCount = $ChatReq->rowCount();
		while($row = $ChatReq->fetch(PDO::FETCH_ASSOC))
		{

			$gameChatID=$row["chatGameId"];
			if ($gameChatID == $id)
			 {
				$GameChatIdDelete= $_db->prepare("DELETE FROM chats WHERE chatGameId=:chatGameId");
				$GameChatIdDelete->execute(array(
					'chatGameId'=>$gameChatID));		
			}
		}

	}
 $UserReq=$_db->query("SELECT * FROM users ORDER BY UserId");
$existCount = $UserReq->rowCount();
	if($existCount==0)
	{
		return "Tom";
	}

	if($existCount > 0)
	{
		while($row=$UserReq->fetch(PDO::FETCH_ASSOC))
		{

			$gameID = $row["GameId"];
			if ($gameID == $id)
			{
				//echo "helo";
				$GameOpponent="";

$UserName=$_SESSION['UserName'];
$opponent = $_SESSION['Opponent'];

				//$GameColor="";
				//$_SESSION["GameOpponent"]="";
				//$UserReq=$_db->query("update users users ORDER BY UserId");


					$GameIdInsert=$_db->prepare("UPDATE users SET GameId=?,GameOpponent=? WHERE UserName=?");
			$GameIdInsert->execute(array($token,$GameOpponent,$UserName));

				$GameIdInsertOpp=$_db->prepare("UPDATE users SET GameId=?,GameOpponent=? WHERE UserName=?");
			$GameIdInsertOpp->execute(array($token,$GameOpponent,$opponent));


			}



}


}
}
}
?>
