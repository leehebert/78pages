<?php 
/*  Auther:
        Lee Hebert

    Version:
        11.4.25.1
*/
	
	/* Set up variables */
	require_once "./class/getProject.php" ;
	$read = new project ;
	$id = $_COOKIE ['id'] ;
	$userDb = "78P_" . $id ;
	$publicDb = "78P_public" ;
	
	/* sets up the title of the page dynamicly */
	/* $read->user ();
	$title = $read->result ['firstName'] . ' ' . $read->result ['lastName'] . "'s Projects" ; */
	
	/* pulls all the active projects into a list */
	$read->projectList ();
	$activeProjects =$read->result ;
 ?>
