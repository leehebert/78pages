<?php 
require '../class/class-edit.php' ;
$edit = new edit ;
IF ($_POST ['submit'] == "Next") {
	$edit->newJob($_POST) ;
	header ('location:../') ;
} ELSE {
	$edit->editJob($_POST) ;
	header ('location:../') ;
}
 ?>