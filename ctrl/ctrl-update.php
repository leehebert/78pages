<?php
require "../class/class-edit.php" ; 
$edit = new edit ;

IF (isset($_GET ['id'])) {
	$type = $_GET ['type'] ;
	$id = $_GET ['id'] ;
	$job = $_GET ['job'] ;
	$edit->job_team ($type, $id, $job) ;
	
} ELSEIF ($_POST ['type'] == 'toc') {
	 $count = 1;
	$job = $_POST ['job'] ;
	WHILE ($count < 9){
		$toc_update [] = Array (
			"checkbox" => $_POST ['checkbox'.$count] , 
			"include" => $_POST ['include'.$count] , 
			"tabOrder" => $_POST ['tabOrder'.$count]
		) ;
		$count ++ ;
	}
	print_r($toc_update);
	echo "<br/>" ;
	print_r($_POST) ;
	/*$edit->update_toc ($toc_update, $_POST ['job'] ) ; */ 
		
} ELSE {
	$name = $_POST ['name'] ;
	$add1 = $_POST ['address1'] ;
	$add2 = $_POST ['address2'] ;
	$city = $_POST ['city'] ;
	$state = $_POST ['state'] ;
	$zip = $_POST ['zip'] ;
	$job = $_POST ['job'] ;
	$table = $_POST ['table'] ;
	$edit->new_job_team ($name, $add1, $add2, $city, $state, $zip, $job, $table) ;
}
/* header ('location:../projectDash.php?id=' . $job) ; */ 
 
?>