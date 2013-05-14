<?php
/*  Auther:
        Lee Hebert

    Version:
        11.4.25.1

    Descrioption:
        Index page for 78pages
			./inc/pages/index.php

*/
	/* Assigns the CSS style for the page */
	$style="web";
	
    //calls the users.php class
    require './class/class-query.php';

	 if ( isset ( $_POST[ 'pass' ] ) ) {  //checks to see if the form has been submited
	 
		/* Assigns the POST variable to a local.  I do this just to make things easier to read */
        $email = $_POST ['email']  ;  
		
		/* This sets up the salted password hash  */
 		$hashPash = "9b63e5b799dfe273f3ad653bf7f1e19c81036e1a".hash('sha256', $_POST['pass']) ; 
		
		/* checks the users table for email and password verification */
		$query = new query;
		$query->select ('78P_public', 'users' , '*' , "email='$email' AND password='$hashPash'" ) ; 

		/* Check the row numbers the query returns.
		If the query returns 1 row then the user is validated and a cookie is set to be valid for 14 days
		if the query does not return 1 row then it directs to an logon rety page */ 
		$numRows = mysql_num_rows( $query->result );
		$loginInfo = mysql_fetch_assoc( $query->result );
		IF ($numRows == 1){
			session_start();
			setcookie("id", $loginInfo['id'], time()+1209600);
			header("location:./home");
		} ELSE {
			$error = "Please check User Name or Password";
		}
    }
	
    $imgSrc = "./";    // sets the location for the images folder
    $title = "Welcome to 78Pages";    // sets the title for the header

?>