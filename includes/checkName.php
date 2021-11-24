<?php
session_start();
require_once ('require.php');
$con=db_open();

if(isset($_POST['player_x']))  //checking if we post the name of player_x
{
	if(!empty($_POST['player_x']))
	{
		$player_name_x=filter_var($_POST["player_x"],FILTER_SANITIZE_STRING);
		$_SESSION['player_x']=$player_name_x;
		$sql="select * from user where name=:name";
		$query=$con->prepare($sql);
		$query->execute(array(':name'=>$player_name_x));
		if($query->rowCount()>0) //after executing sql command if there is already same name existing on database for player_x, rowCount's value will be >0
		{
			echo '<span class="text-danger"><h5> Name already exits! </h5></span>';
			$_SESSION['goRegister'] = 0;
		}
		else
		{
			echo '<span class="text-success"><h5> You can use that name! </h5></span>';
			$_SESSION['goRegister'] = 1;
		}
	}
}
if(isset($_POST['player_o']))
{
	if(!empty($_POST['player_o']))
	{
		$player_name_o=filter_var($_POST["player_o"],FILTER_SANITIZE_STRING);
		$_SESSION['player_o']=$player_name_o;
		$sql2="select * from user where name=:name";
		$query2=$con->prepare($sql2);
		$query2->execute(array(':name'=>$player_name_o));
		if($query2->rowCount()>0)
		{
			echo '<span class="text-danger"><h5> Name already exits! </h5></span>';
			$_SESSION['goRegister'] = 0;
		}
		else
		{
			echo '<span class="text-success"><h5> You can use that name! </h5></span>';
			$_SESSION['goRegister'] = 1;
		}
	}
}
if(isset($_SESSION['player_x']) && isset($_SESSION['player_o']))
{
	if($_SESSION['player_x'] === $_SESSION['player_o'])
	{
		echo '<span class="text-danger"><h5> The two players have same name, please use different one to play the game </h5></span>';
		$_SESSION['goRegister'] = 0;
	}
}
?>