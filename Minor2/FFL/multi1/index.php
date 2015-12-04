<?php 
session_start();
?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="utf-8">
 	<meta name="keywords" content="Chess, Engine, Javascript, Play Chess, Chess program, Javascript">

 	<title>Js chess</title>
 	<link rel="stylesheet" href="css/bootstrap.min.css">
 	<link rel="stylesheet" type="text/css" href="stylesChess.css">
 	
 	<script type="text/javascript">if (!window.console) console= {log: function() {}}; </script>

 </head>

 <body>

 <header>
 	<h3>js chess</h3>
 </header>
<?php include 'php_pages/loginForm.php'; ?>

<!--<div id="FenInDiv">
	<input type="text" id="fenIn"/>
	<button type="button" id="SetFen">Set Position</button>
</div>

<div id="Board">


</div>

<div id="CurrentFenDiv">
	<span id="currentFenSpan"></span>

</div>
-->
<div id="SaveLoadOutput" style="display:none" >
	<!--<div id="lMove"></div>
<input type="submit" id="lMoveSQL_submit" value="Start saved game">
<div id="lMoveSQL_data"></div>

<br/>
<input type="submit" id="lSaveSQL_submit" value="Save board">
<div id="lSaveSQL_data"></div>

<br/>-->
<input type="submit" id="multiplayer_submit" 
onclick="parent.location='chMult/pages/UserLogin.php'"
 value="Multiplayer game" >
</div>

<!--<span id="GameStatus"></span>
 <button type="button" id="NewGameButton">New Game</button><br/>

-->
<?php include 'php_pages/notOutputted.php'; ?>

<footer>

<div class="col-sm-4" style="background-color:Lavender;">

<script src="jquery.js"></script>
<script src="js/buttons/loginlogout.js"></script>
<script src="js/buttons/register.js"></script>
<!--<script src="js/buttons/LoadSavedGame.js"></script>-->
</footer>



 </body>
 </html>