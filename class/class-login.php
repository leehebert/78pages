<?php 
/*  Auther:
        Lee Hebert

    Descrioption:
        This is a class to login
*/
	class login {

		/* Public variables  */
		public $result ;
		
		/* Private variable  */
		private $query ;
		private $data ; 
		private $hashPass ;
		
		
		function __construct() {
			require_once "class-query.php" ;
			$this->query = new query ;
		}
		
		
		function verify ($email, $pass) { 
			$this->hashPass = "9b63e5b799dfe273f3ad653bf7f1e19c81036e1a".hash('sha256', $pass) ;
			$this->query->select ('78p_public', 'users' , '*' , "email='$email' AND password='$this->hashPass'" ) ;
			$this->data = $this->query->result ;
			IF ($this->query->count == 1){
				$this->result = $this->data ['id'] ;
				/* I would like to use this in the future to encrypt user Id's
				 $this->result = rand(1000, 9999) . $this->data ['id']  . rand(1000, 9999) . rand(1000, 9999)				*/
			}
		
		}
	}
?>
