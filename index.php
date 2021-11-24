<!-- 
access = Everyone
purpose = the main page -->
<?php 
require_once ('includes/header.php'); 
require_once ('includes/js/messages.js');
require_once ('includes/js/checkName.js');
session_start();
?>
<body>
<div class="alert alert-warning" id="failed_class" role="alert">
<span class="msg" id="failed_message">
<?php if(isset($_SESSION['goRegister'])) 
{
	if ($_SESSION['goRegister']==0) 
	{
		echo '<script type="text/javascript">error_message();</script>';
		echo "Name already exits, please try a different one";
		unset($_SESSION['goRegister']);
	}
}
?>
</span>
</div>	
<form method="post" action="register.php">
    <div class="container-fluid">
        <h2>Please type your names:</h2>
        <div class="player-name">
            <label for="player-x">First player (X)</label>
            <input type="text" id="player-x" name="player-x" required />
			<span id="available_player_x"> </span>
        </div>
        <div class="player-name">
            <label for="player-o">Second player (O)</label>
            <input type="text" id="player-o" name="player-o" required />
			<span id="available_player_o"> </span>
        </div>
        <button type="submit">Start</button>
    </div>
</form>
</body>
</html>