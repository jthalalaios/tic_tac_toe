<?php
require_once ('includes/require.php');
require_once ('includes/functions.php');
session_start();  //require to use sessions
$con=db_open();  //open connection with database using variable named con
$gameNumber=0;
if(!empty($_POST['player-x'] && $_POST['player-o']))
{
	if ($_SESSION['goRegister'] == 1)
	{
		$player_x_name=filter_var($_POST["player-x"],FILTER_SANITIZE_STRING); //using filter_var method for security
		$player_o_name=filter_var($_POST["player-o"],FILTER_SANITIZE_STRING);
		try 
		{
			$sql=" INSERT INTO user (name) VALUES (:name)" ;  // sql command (sql & sql 2 insert player_x and player_o to database) with PDO method to prevent sql injection
			$query = $con->prepare($sql);    
			$query->execute(array(':name'=>$player_x_name)); 
			$_SESSION['player_x'] = $player_x_name;  //create session for player_x with value 1
		}
		catch(PDOException $e)
		{		
			echo $sql . "<br>" . $e->getMessage();
			$_SESSION['player_x'] = 0;
			die();
		}
		try 
		{
			$sql2=" INSERT INTO user (name) VALUES (:name)" ;
			$query2 = $con->prepare($sql2);    
			$query2->execute(array(':name'=>$player_o_name)); 
			$_SESSION['player_o'] = $player_o_name;   //create session for player_o with value 1
		}
		catch(PDOException $e)
		{	
			echo $sql2 . "<br>" . $e->getMessage();
			die();
			$_SESSION['player_o'] = 0;
		}
		$_SESSION['start'] = 1;
		if($gameNumber==0)
		{
			$gameNumber=1;
			$_SESSION['gameNumber']=$gameNumber;
		}
		$_SESSION['gameNumber']=$_SESSION['gameNumber']+1;
		gotoLocation('start.php');
	}
	else
		gotoLocation('index.php');
}
?>


