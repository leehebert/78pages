<?php 
	if (isset ($_COOKIE ['id'])) {
		header("location:./projectList.php") ;
	} ELSE {
		if (isset($_POST['pass'])) {
			$login = '
        		
			} else {
			$login = '
				<h1>Please log in</h1>
        		<form method="post" action=" ' . $_SERVER['PHP_SELF'] . ' ">
    		        <p>Enter you email address: <input type="text" name="email" /></p>
    		        <p>Enter your password: <input type="password" name="pass" /></p>
    		      	<!--
					<p>Remember me next time: <input type="checkbox" name="rememberMe" /></p>
					-->
    		        <p><input type="submit" name="submit" value="Log In" /></p>
    		    </form>
    		    <p>
    		        Don\'t have an account? <a href="/register/">Register</a>
    		    </p>
			
			' ; }
	}
?>