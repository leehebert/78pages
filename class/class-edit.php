<?php 
/*  Auther:
        Lee Hebert

    Version:
        11.10.24.1

    Descrioption:
        This is a class to edit the site's data
*/

	class edit {

		/* Public variables  */
		public $result ;
		public $count ;
		
		/* Private variable  */
		private $data ;
		private $data2 ;
		private $query ;
		private $userDb ;
		private $publicDb = "78p_public" ;
		private $id ;
		private $userInfo ;

		/* Class Functions */
		function __construct() { 	/* Sets up things to be used below */
			require_once "class-query.php" ;
			$this->query = new query ;
			$this->id = $_COOKIE ['id'] ;
			$this->userDb = "78p_" . $this->id ;
		}
		
		/* Function that adds existing Architect, Consultant, or GC to a JOB */ 
		function job_team ($type, $id, $job) {
			$this->query->update (
				"$this->userDb" , 
				"projects" , 
				"$type", "$id" , 
				"jobNumber = '$job'"
			) ;
		}
		
		/* Function that adds a new Architect, Consultant, or GC to a JOB */
		function new_job_team ($name, $add1, $add2, $city, $state, $zip, $job, $table) {
				$this->query->insert (
					"$this->publicDb" , 
					"$table" , 
					"name, 
						address1, 
						address2, 
						city, 
						state, 
						zip" , 
					"'$name', 
						'$add1', 
						'$add2', 
						'$city', 
						'$state', 
						'$zip'"
				) ;
				
				$this->query->select (
					"$this->publicDb", 
					"$table" , 
					"id" , 
					"address1 = '$add1'"
				) ;
				
				$this->data = $this->query->result ; 
				
				$this->data2 = $this->data ['id'] ;
				
				$this->query->update (
					"$this->userDb" , 
					"projects" , 
					"$table", 
					"'$this->data2'" , 
					"jobNumber = '$job'"
				) ;
		}
		
		/* Function that adds a new project to the projects table */
		function newJob ($array) {
			$this->query->insert (
				"$this->userDb" , 
				"projects" , 
				"jobNumber , 
					projectTitle1 , 
					projectTitle2 ,
					systemType , 
					specificationSection , 
					projectAddressTitle , 
					projectaddress1 , 
					projectaddress2 , 
					city , 
					state , 
					zip , 
					submitToName , 
					submitToAddress1 , 
					submitToAddress2 , 
					submitToCity , 
					submitToState , 
					submitToZip , 
					submitToAttention" , 
				"'{$array ['jobNumber']}' , 
					'{$array ['projectTitle1']}' , 
					'{$array ['projectTitle2']}' , 
					'{$array ['systemType']}' , 
					'{$array ['specificationSection']}' , 
					'{$array ['addressTitle']}' , 
					'{$array ['address1']}' , 
					'{$array ['address2']}' , 
					'{$array ['city']}' , 
					'{$array ['state']}' , 
					'{$array ['zip']}' , 
					'{$array ['submitToName']}' , 
					'{$array ['submitToAddress1']}' , 
					'{$array ['submitToAddress2']}' , 
					'{$array ['submitToCity']}' , 
					'{$array ['submitToState']}' , 
					'{$array ['submitToZip']}' , 
					'{$array ['submitToAttention']}'"
			) ;
		}
		
		/* Function that edits a project record in the projects table */
		function editJob ($array) {
			$this->data = $array ['jobNumber'] ;
			$this->query->update ( 
				"$this->userDb" , "projects" , "projectTitle1" ,
				"'{$array ['projectTitle1']}'" ,"jobNumber = '$this->data'") ;
			$this->query->update ( 
				"$this->userDb" , "projects" , "projectTitle2" ,
				"'{$array ['projectTitle2']}'" ,"jobNumber = '$this->data'") ;
			$this->query->update ( 
				"$this->userDb" , "projects" , "systemType" ,
				"'{$array ['systemType']}'" ,"jobNumber = '$this->data'") ;	
			$this->query->update ( 
				"$this->userDb" , "projects" , "specificationSection" ,
				"'{$array ['specificationSection']}'" ,"jobNumber = '$this->data'") ;	
			$this->query->update ( 
				"$this->userDb" , "projects" , "projectAddressTitle" ,
				"'{$array ['addressTitle']}'" ,"jobNumber = '$this->data'") ;	
			$this->query->update ( 
				"$this->userDb" , "projects" , "projectaddress1" ,
				"'{$array ['address1']}'" ,"jobNumber = '$this->data'") ;	
			$this->query->update ( 
				"$this->userDb" , "projects" , "projectaddress2" ,
				"'{$array ['address2']}'" ,"jobNumber = '$this->data'") ;	
			$this->query->update ( 
				"$this->userDb" , "projects" , "city" ,
				"'{$array ['city']}'" ,"jobNumber = '$this->data'") ;	
			$this->query->update ( 
				"$this->userDb" , "projects" , "state" ,
				"'{$array ['state']}'" ,"jobNumber = '$this->data'") ;	
			$this->query->update ( 
				"$this->userDb" , "projects" , "zip" ,
				"'{$array ['zip']}'" ,"jobNumber = '$this->data'") ;	
			$this->query->update ( 
				"$this->userDb" , "projects" , "submitToName" ,
				"'{$array ['submitToName']}'" ,"jobNumber = '$this->data'") ;	
			$this->query->update ( 
				"$this->userDb" , "projects" , "submitToAddress1" ,
				"'{$array ['submitToAddress1']}'" ,"jobNumber = '$this->data'") ;	
			$this->query->update ( 
				"$this->userDb" , "projects" , "submitToAddress2" ,
				"'{$array ['submitToAddress2']}'" ,"jobNumber = '$this->data'") ;	
			$this->query->update ( 
				"$this->userDb" , "projects" , "submitToCity" ,
				"'{$array ['submitToCity']}'" ,"jobNumber = '$this->data'") ;	
			$this->query->update ( 
				"$this->userDb" , "projects" , "submitToState" ,
				"'{$array ['submitToState']}'" ,"jobNumber = '$this->data'") ;	
			$this->query->update ( 
				"$this->userDb" , "projects" , "submitToZip" ,
				"'{$array ['submitToZip']}'" ,"jobNumber = '$this->data'") ;	
			$this->query->update ( 
				"$this->userDb" , "projects" , "submitToAttention" ,
				"'{$array ['submitToAttention']}'" ,"jobNumber = '$this->data'") ;	
		}
	
		/* Function that updated the jobs Table of Contencts */ 
		function update_toc ($array, $job) {
			foreach ($array as $row) {
			$this->query->update ( 
				"$this->userDb" , "toc" , "include" ,
				"'{$array ['include']}'" ,"jobNumber = '$job' & tabOrder = '{$array ['tabOrder']}'") ;
			}
		}
	}
?>

