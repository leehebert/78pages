 <?php 
 	
	/* Calls the login class and sets up the $login Var */
 		require_once "./class/class-login.php" ;
		$login = new login ;
	
	/* Assigns the POST variable to a local.  I do this just to make things easier to read */
        $email = $_POST ['email']  ;  
 		$pass = $_POST['pass'] ; 
		
	/* checks the users table for email and password verification */
		$login->verify ($email, $pass) ;
		if ($login->result) {
			setcookie ("id", $login->result, time()+1209600, "/") ;
			header("location:projects.php") ;
		} else {
			setcookie ("error", $login->error, time()+2, "/") ;
			header("location:../") ;
		}
?>


