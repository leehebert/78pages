<?php
/*  Auther:
        Lee Hebert

    Version:
        11.4.25.1

    Descrioption:
        Controller used for all project updates

*/
	IF (isset($_POST ['job'] )) {
		$type = $_POST ['update'] ;
		$job = $_POST['job'] ;
	} ELSE {
		$type = $_GET ['type'] ;
		$job = $_GET ['job'] ;
	}
	
	$indefiniteArticles = " a " ;
	$c = 0 ;
	if ($type == "Architect") { $table = 'architect' ; $indefiniteArticles = " an " ; }
	if ($type == "Consultant") { $table = "consultant" ; }
	if ($type == "General Contractor") { $table = "general" ; }
	$list = $table . "_list" ;
	
	require './class/class-read.php';
	$update = new read ;
	
	/* Get a list */ 
	$update->$list();
	$newList = $update->result ;
	$rows = $update->count ;
	
?>	

