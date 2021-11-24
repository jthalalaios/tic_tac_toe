<?php
function gotoLocation($location){
	$returnheader = header("location: $location");
	return $returnheader;	
}
?>

