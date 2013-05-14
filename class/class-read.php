<?php 
/*  Auther:
        Lee Hebert

    Version:
        11.10.24.1

    Descrioption:
        This is a class to gather all the neccessary data for a project
		
	API:
		client ($job)
			result	=	ARRAY(name, address1, address2, city, state, zip, attentionClient)
			Information for a particular Job #
			
			
		architect ($job)
			result 	=	architect Information for a particular Job #
			list	=	a list of all stored public architects to choose from
			
		consultant ($job)
			result 	=	consultant Information for a particular Job #
			list	=	a list of all stored public consultants to choose from
			
		general ($job)
			result 	=	genral contractor Information for a particular Job #
			list	=	a list of all stored public genral contractors to choose from
			
		toc ($job)
		bom ($job)
			bom		=	A list of parts for a particular job
			list	=	A list of all stroed public parts to choose from
			
		site ($job)
		branch ()
		user ()
		projectList ()
		consultant_list()
		general_list()				
		architect_list()
*/
	class read {

		/* Public variables  *////////////////////////////////////////////////////////////
		public $result ;
		public $count ;
		public $bom ;
		public $list ;
				
		/* Private variable  *////////////////////////////////////////////////////////////
		private $data ;
		private $data2 ;
		private $data3 ;
		private $data4 ;
		private $data5 ;
		private $query ;
		private $userDb ;
		private $publicDb ;
		private $id ;
		private $userInfo ;

		/* Class Functions */
		FUNCTION __construct() { 	/* Sets up things to be used below *//////////////////
			require_once "class-query.php" ;
			$this->query = new query ;
			$this->id = $_COOKIE ['id'] ;
			$this->userDb = "78p_" . $this->id ;
			$this->publicDb = "78p_public" ;
		}
		
		
		FUNCTION client ($job) { 			/* Client data *//////////////////////////////
			$this->query->select ( "$this->userDb" , "projects", "submitToName, submitToAddress1, submitToAddress2, submitTocity, submitTostate, submitTozip, submitToAttention" , "jobNumber = '$job' " ) ;
	    	$this->data = $this->query->result ;
			$this->result = ARRAY (
								"name" => $this->data ['submitToName'] ,
								"address1" => $this->data ['submitToAddress1'] ,
								"address2" =>  $this->data ['submitToAddress2'] ,
								"city"=>  $this->data ['submitTocity'] ,
								"state" =>  $this->data ['submitTostate'] ,
								"zip" =>  $this->data ['submitTozip'] ,
								"attention" => $this->data ['submitToAttention']
							);
		}
		

		FUNCTION architect ($job) {		/* Architects data *//////////////////////////////
			$this->query->select ( "$this->userDb" , "projects", "architect" , "jobNumber = '$job' " ) ;
	    	$this->data = $this->query->result ;
			$this->data2 = $this->data ['architect'];
			$this->query->select ( "$this->publicDb" , "architect", "*" , "id = ' $this->data2 ' " ) ;
    		$this->data = $this->query->result ;
			$this->result = ARRAY (
								"name" => $this->data ['name'] ,
								"address1" => $this->data ['address1'] ,
								"address2" =>  $this->data ['address2'] ,
								"city"=>  $this->data ['city'] ,
								"state" =>  $this->data ['state'] ,
								"zip" =>  $this->data ['zip'] 
							);
		}
		
			
		FUNCTION consultant ($job) {	/* Consultants data */////////////////////////////
			$this->query->select ( "$this->userDb" , "projects", "consultant" , "jobNumber = '$job' " ) ;
    		$this->data = $this->query->result ;
			$this->data2 = $this->data ['consultant'];
			$this->query->select ( "$this->publicDb" , "consultant", "*" , "id = ' $this->data2 ' " ) ;
    		$this->data = $this->query->result ;
			$this->result = ARRAY (
								"name" => $this->data ['name'] ,
								"address1" => $this->data ['address1'] ,
								"address2" =>  $this->data ['address2'] ,
								"city"=>  $this->data ['city'] ,
								"state" =>  $this->data ['state'] ,
								"zip" =>  $this->data ['zip'] 
							);
		}
		
			
		FUNCTION general ($job) {	/* General Contractors data */////////////////////////
			$this->query->select ( "$this->userDb" , "projects", "general" , "jobNumber = '$job' " ) ;
    		$this->data = $this->query->result ;
			$this->data2 = $this->data ['general'];
			$this->query->select ( "$this->publicDb" , "general", "*" , "id = ' $this->data2 ' " ) ;
			$this->data = $this->query->result ;
			$this->result = ARRAY (
								"name" => $this->data ['name'] ,
								"address1" => $this->data ['address1'] ,
								"address2" =>  $this->data ['address2'] ,
								"city"=>  $this->data ['city'] ,
								"state" =>  $this->data ['state'] ,
								"zip" =>  $this->data ['zip'] 
							);
		}
		
			
		FUNCTION toc ($job) {	/* Table of Contents *////////////////////////////////////
			$this->query->select ( "$this->userDb" , "toc", "*" , "job = '$job'" ) ;
			$this->result = $this->query->result ;
		}
			
		
		FUNCTION bom ($job) { 	/* Bill of Materials *////////////////////////////////////
			/* Grab a list of part number IDs and their Qty's from the users bom table */ 
			$this->query->select ("$this->userDb" , "bom" , "*" , "jobNumber = '$job'") ;
			WHILE ($row = mysql_fetch_assoc ($this->query->raw) ) {
				$this->data3 [] = $row ;
			}
			
			$this->count = $this->query->count ;
			
			IF ($this->count >0 ) {
			
				/*Now use the info from the first query to get the MFG, Part #, and Description */
				FOREACH ( $this->data3 AS $row) {
					$this->query->select ("$this->publicDb" , "parts" , "*" , "id = '{$row ['partId']} '") ;
					$value = $this->query->result ;
					$this->bom [] = array (
								"partNumber" => $value ['partNumber'] ,
								"mfg" => $value ['mfg'] ,
								"description" => $value ['description'] ,
								"qty" => $row ['qty'] );
				}
			}
			
			$this->query->selectSimpleOrdered ("$this->publicDb", "parts", "*", 'mfg, partNumber') ;
			WHILE ($row = mysql_fetch_assoc ($this->query->raw) ) {
				$this->list [] = $row ;
			}
		}
		
		
		
		FUNCTION site ($job) { 			/* Site data *////////////////////////////////////
			$this->query->select ( "$this->userDb" , "projects", "id, projectDesigner, projectManager, systemType, projectTitle1, projectTitle2, projectAddressTitle, projectaddress1, projectaddress2, city, state, zip, specificationSection " , "jobNumber = '$job' " ) ;
	    	$this->data = $this->query->result ;
			$this->result = ARRAY (
								"id" => $this->data ['id'] ,
								"title1" => $this->data ['projectTitle1'] ,
								"title2" => $this->data ['projectTitle2'] ,
								"name" => $this->data ['projectAddressTitle'] ,
								"address1" => $this->data ['projectaddress1'] ,
								"address2" =>  $this->data ['projectaddress2'] ,
								"city"=>  $this->data ['city'] ,
								"state" =>  $this->data ['state'] ,
								"zip" =>  $this->data ['zip'] ,
								"spec" => $this->data ['specificationSection'] ,
								"system" =>	$this->data ['systemType'] ,
								"projectManager" => $this->data ['projectManager'] ,
								"projectDesigner" => $this->data ['projectDesigner']
							);
		}
		
		
		FUNCTION branch () { 		/* Company information *//////////////////////////////
			$this->query->selectSimple ( "$this->userDb" , "branches" , "*" );
			$this->data = $this->query->result ;
			$this->result = ARRAY (
							"name" => $this->data ['name'] ,
							"address1" => $this->data ['address1'] ,
							"address2" => $this->data ['address2'] ,
							"city" => $this->data ['city'] ,
							"state" => $this->data ['state'] ,
							"zip" => $this->data ['zip'] ,
							"phone" => $this->data ['phone'] ,
							"fax" => $this->data ['fax']
							);
		}

			/* sets up the title of the page dynamicly *//////////////////////////////////
		FUNCTION user () {
			$this->query->select ( "$this->publicDb", "users", "*", "id = '$this->id'" ) ;
			$this->result = $this->query->result ;
		}
	
	/* pulls all the active projects *////////////////////////////////////////////////////
		FUNCTION projectList () {
			$this->query->selectSimple ("$this->userDb",  'projects' , 'jobNumber, projectTitle1, projectTitle2') ;
			WHILE ($row = mysql_fetch_assoc ($this->query->raw) ){
				$this->result [] = $row ;
				$this->count = $this->query->count ;
			}
		}
		
		/* Functions to pull up lists for edit promps *////////////////////////////////// 
		FUNCTION consultant_list() {
			$this->query->selectSimple ("$this->publicDb" , 'consultant' , "*") ;
			WHILE ($row = mysql_fetch_assoc ($this->query->raw)) {
				$this->result [] = $row ;
			}
			$this->count = $this->query->count ;
		}
				
		FUNCTION general_list() {
			$this->query->selectSimple ("$this->publicDb" , 'general' , "*") ;
			WHILE ($row = mysql_fetch_assoc ($this->query->raw)) {
				$this->result [] = $row ;
			}
			$this->count = $this->query->count ;
		}
				
		FUNCTION architect_list() {
			$this->query->selectSimple ("$this->publicDb","architect","*") ;
			WHILE ($row = mysql_fetch_assoc ($this->query->raw)) {
				$this->result [] = $row ;
			}
			$this->count = $this->query->count ;
		}
	}

?>

