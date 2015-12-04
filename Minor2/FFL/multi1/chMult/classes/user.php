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
		return $this->UserId=$UserName;
	}
	public function getUserMail(){
		return $this->UserMail;
	}
	public function setUserMail($UserMail){
		return $this->UserId=$UserMail;
	}
	public function getUserPassword(){
		return $this->UserPassword;
	}
	public function setUserPassword($UserPassword){
		return $this->UserId=$UserPassword;
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
		return $this->UserGameId=$UserGameOpponent;
	}
	public function getUserGameColor(){
		return $this->UserGameColor;
	}
	public function setUserGameColor($UserGameColor){
		return $this->UserGameColor=$UserGameColor;
	}

	public function InsertUser(){
		$linkid=mysql_connect('localhost','root','')or die("Couldnot connect");
		$query1= "INSERT INTO users (UserName,UserPassword) VALUES ({$_SESSION['username']},{$_SESSION['userpassword']})";

       $result=mysql_db_query('minor_project',$query1,$linkid);

		
		$result->execute(array('UserName'=>$this->getUserName(),
								    'UserPassword'=>$this->getUserPassword()
								    ));

	}

	public function UserLogin(){
		$arr1=array("UserId"=>array(),"GameOpponent"=>array(),"GameId"=>array(),"UserName"=>array(),"UserPassword"=>array());
		$linkid=mysql_connect('localhost','root','')or die("Couldnot connect");
		//echo $query2= "INSERT INTO users (UserName,UserPassword) VALUES ({$_SESSION['username']},{$_SESSION['userpassword']})";
		//echo $_SESSION['username'];
	$query2="SELECT * from users"; 
		//$query2=("Select * from users where UserName=:UserName AND UserPassword=:UserPassword");
		   $result1=mysql_db_query('minor_project',$query2,$linkid);
		   $i=0;
		  while($row1=mysql_fetch_array($result1)){
		  	if($row1["UserName"]==$_SESSION['username'] &&  $row1["UserPassword"]==$_SESSION['userpassword'] )
		  	{
		  		echo "yesonly";
		  			$i++;
		  			//'UserName'->$this->getUserName();
							   // 'UserPassword'->$this->getUserPassword();
		  			$this->setUserId($row1['UserId']);
				$this->setUserGameId($row1['GameId']);
				$this->setUserGameOpponent($row1['GameOpponent']);
				//$this->setUserGameColor($row['GameColor']);
				  echo $i;
				echo "rgr";
				if($row1["GameId"]==0){
					header("Location:indexMult.php");
				}else{
					header("Location:Ch/index.php");
				}
		$something = "true";
	//	echo $something;
    return $something;
	

		
		  	}
		  
		  }




		  
				
		
			//	$result1->execute(array('UserName'=>$this->getUserName(),
			//					    'UserPassword'=>$this->getUserPassword()
			//					    ));
			//					echo $query2 = mysql_query("SELECT COUNT(*) FROM users");

		/*if($UserRequest->rowCount()==0){
			header("Location:../index.php?error=1");
			return false;
		}
		else{
			while($row=$UserRequest->fetch()){
				$this->setUserId($row['UserId']);
				$this->setUserGameId($row['GameId']);
				$this->setUserGameOpponent($row['GameOpponent']);
				$this->setUserGameColor($row['GameColor']);
				if($row["GameId"]==0){
					header("Location:indexMult.php");
				}else{
					header("Location:Ch/index.php");
				}
				return true;
			}*/
									    		
	}

	public function DisplayAvailablePlayers(){
		$linkid=mysql_connect('localhost','root','')or die("Couldnot connect");
		
	 $query3="SELECT * from users ORDER BY UserId"; 
	   $result1=mysql_db_query('minor_project',$query3,$linkid);
	   $i=0;
		  while($row2=mysql_fetch_array($result1)){
		  	$name=$row2["UserName"];
		  	$token=$row2["GameId"];
		  	if($row2["UserName"]!=$_SESSION['UserName'])
		  	{
		  		if($row2["GameId"]!=0)
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
		  		if($row2["GameId"]!=0)
		  		{?>
		  			<span style="color:red" class="UserNames"><?php echo $name;?>
		  			</span>
		  			<?php
		  		}
		  		else
		  		{?>

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

?>