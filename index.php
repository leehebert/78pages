<?php 
	include "./inc/header.php" ; 
    	if (isset($_COOKIE ['id'])) {
		header("location:projects.php") ;
	} else {
?>
	
	<div class="container_12">
		<div class="title">Please log in</div>
			<form method="post" action="login.php">
				<div style="float:left; width:150px;">
					<h3>Email</h3>
					<input type="text" data-hint="Email" name="email" />
				</div>
				<div style="float:left;">
					<h3>Password</h3>
					<input type="password" data-hint="Password "name="pass" />
				</div>
				<div style="clear:both; padding-top:10px;">
					<input type="submit" name="submit" value="Log In" />
				</div>
			</form>
	</div>
  <?php }
  	include "./inc/footer.php" ; 
