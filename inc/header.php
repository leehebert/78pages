<?php 
    $error = "" ;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title> <?php if(isset ($title)) { echo $title; } else { echo "Welcome to 78 Pages"; } ?> </title>
		<link href="./css/reset.css" rel="stylesheet" type="text/css" />
		<link href="./css/960.css" rel="stylesheet" type="text/css" />
		<link href="./css/main.css" rel="stylesheet" type="text/css" />
		<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700|Josefin+Sans|Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
	
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
		<script type="text/javascript">
			$(function() {
				var $items = $('#vtab>ul>li');
				$items.click(function() {
					$items.removeClass('selected');
					$(this).addClass('selected');

				var index = $items.index($(this));
                $('#vtab>div').hide().eq(index).show();
				}).eq(0).click();
			});
		</script>
    </head>
    <body>
		<div id="content">
			<div class="container_12">
				<div class="grid_12" id="head">
					<a href="../"></a>
				</div>
			</div>
		  	
