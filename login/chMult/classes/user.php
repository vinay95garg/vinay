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
public function UserLogin(){
		include "../../connectToDB.php";
		echo "hello";
		

		$UserRequest=$_db->prepare("SELECT * FROM users where UserName=:UserName AND UserPassword=:UserPassword");
		//$UserRequest=$_db->prepare("SELECT * FROM  users (UserName,UserPassword) VALUES (:UserName,:UserPassword)"); 
		$UserRequest->execute(array(
									'UserName'=>$this->getUserName(),
								    'UserPassword'=>$this->getUserPassword()
								    ));

			//echo $UserRequest->rowCount();
		if($UserRequest->rowCount()==0){
			header("Location:../index.php?error=1");
			return false;
		}
		else{
			while($row=$UserRequest->fetch()){
				$this->setUserId($row['UserId']);
				$this->setUserGameId($row['GameId']);
				$this->setUserGameOpponent($row['GameOpponent']);
				// $this->setUserGameColor($row['GameColor']);
				if($row["GameId"]==0){
					header("Location:indexMult.php");
				}else{
					header("Location:Ch/index.php");
				}
				return true;
			}
		}								    		
	}

	public function DisplayAvailablePlayers(){
		//$linkid=mysql_connect('localhost','root','')or die("Couldnot connect");
		include"../../connectToDB.php";
	 $UserReq=$_db->query("SELECT * from users ORDER BY UserId");
	 //$query3="SELECT * from users ORDER BY UserId"; 
	   //$result1=mysql_db_query('minor_project',$query3,$linkid);
	   $existCount =$UserReq->rowCount();
	   if($existCount ==0)
	   {

	   	return "Tom";
	   }


	   //$i=0;
		 if ($existCount > 0) 
		 {
		 	
		  //while($row2=mysql_fetch_array($result1))
		 	while($row = $UserReq->fetch(PDO::FETCH_ASSOC))
		  {
		  	$name=$row["UserName"];
		  	$token=$row["GameId"];
		  	if($row["UserName"]!=$_SESSION['UserName'])
		  	{
		  		if($row["GameId"]!=0)
		  		{
		  			$available="not available";
		  		}
		  		else
		  		{
		  			$available="available";
		  		}
		  		if($token==0)
		  		{
		  			$token=rand(10000,1000000);
		  		}
		  		if($row["GameId"]!=0)
		  		{
		  			?>
		  			<span style="color:red" class="UserNames"><?php echo $name;?>
		  			</span>
		  			<?php
		  		}
		  		else
		  		{
		  			?>

		  			<span style="color:green" class="UserNames" onclick="parent.location='redirect.php?id=<?php echo $token;?>&name=<?php echo $name;?>';"><?php echo $name;?>
		  			</span> 
		  			<?php
		  		}
?>
		  		</span> is
		  		<span class ="ChatMessages" ><?php echo $available;?>
		  		</span></br>
		  		<?php

		  	//echo $name;
			//$i++;
		}
		}
		

		//$UserReq=$_db->query("Select * from users ORDER BY UserId");
		//$existCount=$UserReq->rowCount();
		//if($existCount==0){
		//	return "Tom";
		//}
	}

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
