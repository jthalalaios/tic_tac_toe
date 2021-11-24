<?php
require_once ('require.php');
session_start();
$con=db_open();
$output = '';
if (isset($_POST['gamePrevious']))
{
	$_SESSION['previousGame']=filter_var($_POST['gamePrevious'],FILTER_SANITIZE_NUMBER_INT);
}
if(isset($_SESSION['previousGame']))
{
try 
{	
	$sql="DELETE  from history WHERE game_number=:game_number ";
	$query = $con->prepare($sql);
	$query->execute(array(':game_number'=>$_SESSION['previousGame']));
}
catch(PDOException $e)
{	
	echo $sql . "<br>" . $e->getMessage();
	die();
}
}
?>

