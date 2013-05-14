<?php
	$file = $_GET ['file'] . "_datasheets.zip";
	echo $file;
	header("Content-Type: application/zip");
    header("Content-Disposition: attachment; filename=$file");
    readfile('$file');
?>