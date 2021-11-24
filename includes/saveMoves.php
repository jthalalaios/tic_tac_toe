<?php
require_once ('require.php');
session_start();
$con=db_open();
if (isset($_POST['cellPosition']))
{
	$_SESSION['cellPosition']=filter_var($_POST['cellPosition'],FILTER_SANITIZE_STRING);
}
if (isset($_POST['who']))
{
	$_SESSION['playerName']=filter_var($_POST['who'],FILTER_SANITIZE_STRING);
}
if (isset($_POST['gameNumber']))
{
	$_SESSION['numberOfGame']=filter_var($_POST['gameNumber'],FILTER_SANITIZE_STRING);
}
if (isset($_SESSION['cellPosition']) && ($_SESSION['playerName']))
{	
	try 
	{
		$sql=" select id from user where name=:name" ;  
		$query = $con->prepare($sql);    
		$query->execute(array(':name'=>$_SESSION['playerName'])); 
		$user_id=$query->fetchColumn(0);
	}
	catch(PDOException $e)
	{		
		echo $sql . "<br>" . $e->getMessage();
		die();
	}
	try 
	{
		$sql2=" INSERT INTO history (id_user,game_number,move) VALUES (:id_user,:game_number,:move)" ;
		$query2 = $con->prepare($sql2);    
		$query2->execute(array(':id_user'=>$user_id,':game_number'=>$_SESSION['numberOfGame'],':move'=>$_SESSION['cellPosition'])); 
	}
	catch(PDOException $e)
	{		
		echo $sql2 . "<br>" . $e->getMessage();
		die();
	}
	unset($_SESSION['cellPosition']);
	unset($_SESSION['playerName']);
	unset($_SESSION['numberOfGame']);;
}
?>