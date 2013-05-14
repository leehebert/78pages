<?php 

require "./class/class-read.php" ;
	$read = new read ;
	
	/* Parts List */
		$read->bom ($_SESSION ['job'] ) ; 
		$partsList = $read->list ;

?>