<?php
require_once ('functions.php');
if(isset($_SESSION['start']))
{
	if($_SESSION['start'] !=1 )
		gotoLocation('index.php');
}
?>