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
		$chatInsert=$_db->prepare("INSERT INTO  chats (ChatUserId,chatGameId,ChatText) VALUES (:ChatUserId,:chatGameId,:ChatText)");
		$chatInsert->execute(array('ChatUserId'=>$this->getChatUserId(),
			'chatGameId'=>$this->getChatGameId(),
			'ChatText'=>$this->getChatText()
			));


	}

	public function DisplayMessage(){
		
			

		include "../../connectToDB.php";
		$ChatReq=$_db->prepare("SELECT * FROM chats WHERE chatGameId=:chatGameId ORDER BY ChatId DESC ");
		$ChatReq->execute(array('chatGameId'=>"0"));
		
		$ChatIdForGame=$this->getChatGameId();
		$existCount=$ChatReq->rowCount();
		//echo $existCount;
		if($existCount==0){
			return "Tom";
		}
		if($existCount>0){
			while($rowChat=$ChatReq->fetch()){
				$UserReq=$_db->prepare("SELECT * From users WHERE UserId=:UserId");
				$UserReq->execute(array('UserId'=>$rowChat['ChatUserId']));
				$rowUser=$UserReq->fetch();
				if ($rowChat["chatGameId"]==0){
					?>

					<span class="UserNameS"><?php echo $rowUser['UserName'];?></span>says:
					<span class="chatMessageS"><?php echo $rowChat['ChatText'];?></span></br>
					<?php
				}
			}
		}

		if($existCount>15){
			$_db->exec("DELETE from chats ORDER BY chatId LIMIT 1");
			$GameOnReq=$_db->prepare("SELECT * from users WHERE UserId=:UserId LIMIT 1");
			$GameOnReq->execute(array('UserId'=>$this->getChatUserId()
				));
			$existCount=$GameOnReq->rowCount();
			if($existCount>0){
				while($rowGameOn=$GameOnReq->fetch()){
					if ($rowGameOn["GameId"]!=0){
						$token=$rowGameOn["GameId"];
						$opponent=$rowGameOn["GameOpponent"];
						$string="?id=" . $token . "&name=" . $opponent;
						$home_url='http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/redirect.php' . $string;
						print "<script>document.location.href='$home_url' ;</script>";
					}
				}
			}
			else{
				return "";
			}
		}
	}


	public function DisplayMessagesInGame(){
		include "../../connectToDB.php";
		$ChatReq=$_db->prepare("SELECT * FROM chats WHERE chatGameId=:chatGameId ORDER BY ChatId");
		$ChatReq->execute(array('chatGameId'=>$this->getChatGameId()

			));
		$existCount=$ChatReq->rowCount();
		if($existCount==0){
			return "";
		}
		if($existCount>0){
			while($rowChat=$ChatReq->fetch()){
				$UserReq=$_db->prepare("SELECT * FROM users WHERE UserId=:UserId");
				$UserReq->execute(array(
					'UserId'=>$rowChat['ChatUserId']

					));
				$rowUser=$UserReq->fetch();
				?>
				<span class="UserNameS"><?php echo $rowUser['UserName'];?></span>says:
				<span class="ChatMessageS"><?php echo $rowChat['ChatText'];?></span></br>
				<?php

			}
		}
		$GameOnReq=$_db->prepare("Select * from users WHERE UserId=:UserId LIMIT 1");
		$GameOnReq->execute(array('UserId'=>$this->getChatUserId()
			));
		$existCount=$GameOnReq->rowCount();
		if($existCount>0){
			while($rowGameOn=$GameOnReq->fetch()){
				if($rowGameOn["GameId"]==0){

				$home_url='http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/indexMult.php';
				print "<script>document.location.href='$home_url'; </script>";
				exit;
				}
			}
	}else{
		return "";
		}

	}

  }

  ?>


