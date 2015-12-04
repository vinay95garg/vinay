<?php

	session_start();


?>

<head>
	<link rel="stylesheet" href="styles.css">
	<title>JSCHESS</title>
	<link href="styles.css" rel="stylesheet" type="text/css">
	<script type="text/javascript"> if (!window.console) console={log: function() {} };</script>
</head>
<body>
	<header>
		<h3>JS CHESS</h3>
	</header>
	<input type="submit" onclick="parent.location='../indexmult.php'" id="deleteGame-submit" value="New Opponent">
	<h2>Welcome<span style="color:green"><?php echo $_SESSION['UserName'];?>!</span>You are playing against <span style="color:red"><?php echo $_SESSION['Opponent'];?></span>
	</h2>
	<div id="FenInDiv" style="display:none;">
		<input type="text" id="fenIn"/>
		<button type="button" id="SetFen">Set Position</button>
	</div>
	<div id="ThinkingImageDiv">
	</div>
	<div id="Board">
	</div>
	<div id="CurrentFenDiv">
		<span id="currentFenSpan" style="display:none;"></span>
	</div>
	<div id="ChatMessages">
	</div>
	<div id="AvailablePlayers"></div>
	<div id="ChatMessages"></div>
	<div id="ChatBig">
		<span style="color:green">Chat</span><br/>
		<textarea id="ChatText" name="ChatText"></textarea>
	</div>
	<button type="button" id="NewGameButton">New Game</button><br/>
	<span id="GameStatus" ></span>
	<div id="EngineOutput"><br/>

		<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
		<script type="text/javascript" src="js/defs.js"></script>
		<script type="text/javascript" src="js/io.js"></script>
		<script type="text/javascript" src="js/board.js"></script>
		<script type="text/javascript" src="js/movegen.js"></script>
		<script type="text/javascript" src="js/makemove.js"></script>
		<script type="text/javascript" src="js/perft.js"></script>
		<script type="text/javascript" src="js/evaluate.js"></script>
		<script type="text/javascript" src="js/pvtable.js"></script>
		<script type="text/javascript" src="js/search.js"></script>
		<script type="text/javascript" src="js/protocol.js"></script>
		<script type="text/javascript" src="js/guiMultiPlayer.js"></script>
		<script type="text/javascript" src="js/main.js"></script>
		<script type="text/javascript" src="js/deleteDB.js"></script>
		<script type="text/javascript" src="../../js/chatBoxInGame.js"></script>
</body>