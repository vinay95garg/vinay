<?php
class chat{
	private $ChatId,$ChatUserId,$ChatText,$ChatTextGameId;
	public function getChatId(){
		return $this->ChatId;
	}
	public function setChatId($ChatId){
		return $this->ChatId=$ChatId;
	}
	public function getChatUserId(){
		return $this->ChatUserId;
	}
	public function setChatUserId($ChatUserId){
		return $this->ChatUserId=$ChatUserId;
	}
	public function getChatText(){
		return $this->ChatText;
	}
	public function setChatText($ChatText){
		return $this->ChatText=$ChatText;
	}
	public function getChatGameId(){
		return $this->ChatTextGameId;
	}
	public function setChatGameId($ChatTextId){
		return $this->ChatTextGameId=$ChatTextId;
	}
	
	public function InsertChatMessage(){
		include "../../connectToDB.php";
		//echo "helloi";
	/*	$chatInsert=$_db->prepare("INSERT INTO  chats (ChatUserId,chatGameId,ChatText) VALUES (:ChatUserId,:chatGameId,:ChatText)");
		$chatInsert->execute(array('ChatUserId'=>$this->getChatUserId(),
			'chatGameId'=>$this->getChatGameId(),
			'ChatText'=>$this->getChatText()
			));*/

$opponent=0;
$username=$_SESSION['UserName'];
$ChatText=$this->getChatText();
	$GameIdInsert=$_db->prepare("UPDATE personal_team_info SET user_id=?,player_id=? where user_id='$username' AND player_id='$ChatText'");
			$GameIdInsert->execute(array($username,$opponent));
			/*?>
				<span class="UserNameS"><?php echo $rowUser['UserName'];?></span>says:
				<span class="ChatMessageS"><?php echo $rowChat['ChatText'];?></span></br>
<?*/
	}

	


  }

  ?>


