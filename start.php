<?php 
require_once ('includes/session.php');
require_once ('includes/header.php');
session_start(); 
include('includes/historyModal.php');
?>
<body>
<div class="container-fluid">
	<div class="message"><h2><?php echo $_SESSION['player_x'] ?>'s turn:</h2></div>
	 <div class="reset"><button type="button" id="reset_but">Reset</button></div>
		<div class="game-grid">
			<div class="game-cell top-left"></div>
			<div class="game-cell top-middle"></div>
			<div class="game-cell top-right"></div>
			<div class="game-cell middle-left"></div>
			<div class="game-cell middle-middle"></div>
			<div class="game-cell middle-right"></div>
			<div class="game-cell bottom-left"></div>
			<div class="game-cell bottom-middle"></div>
			<div class="game-cell bottom-right"></div>
		</div>
		<div class="container-left">
			<a href="#previousGame<?php echo $_SESSION['previousGame']; ?>" id="refreshPreviousGame"data-toggle="modal" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> PreviousGame</a>
		</div>
</div>
<div class="player_x_name" id="player_x" name="player_x" value="<?php echo $_SESSION['player_x'] ?>"></div>
<div class="player_o_name" id="player_o" name="player_o" value="<?php echo $_SESSION['player_o'] ?>"></div>
<div class="game_number" id="game_number" name="game_nubmer" value="<?php echo $_SESSION['gameNumber'] ?>"></div>
<?php
require('includes/js/main.js');
?>
</body>
</html>


