<?php
/*  Auther:
        Lee Hebert

    Version:
        11.4.25.1

    Descrioption:
        Controller for projectDash.php

*/

    //Assisgns the job number to a variable
    $job = $_SESSION['job'];
	
	/* The following sets up variables used in the page */
	$title = "78Pages Project - ".$job;    // sets the title for the header
	
	
	
	   /////////////////////////////////////////////////////////////////
	  //  This little chunk sets up the project class and assigns    //
	 //   the result to variables for use throughout the controller //
	/////////////////////////////////////////////////////////////////
	
	
	require "./class/class-read.php" ;
	$read = new read ;
	
	/* site info */
		$read->site ($job) ; 
		$projectInfo = $read->result ;
		
	/* customer info */
		$read->client ($job) ; 
		$client = $read->result ;
		
	/* architect info */
		$read->architect ($job) ; 
		$archInfo = $read->result ;	
		
	/* consultant info */	
		$read->consultant ($job) ; 
		$conInfo = $read->result ;	
		
	/* general contractors info */	
		$read->general ($job) ; 
		$genInfo = $read->result ;	
		
	/* Table of Contents */	
		$read->toc ($job) ; 
		$toc = $read->result ;
		$tocCount = $read->count - 1 ;	
		
	/* bill of materials */
		$read->bom ($job) ;
		$bom = $read->bom ;
		
		
		
	  ////////////////////////////////////////////////	
	 //* now we format the variables for the page *//
	////////////////////////////////////////////////
	
	/* Site Information */
		IF ( $projectInfo ['address2']!=""){
			$project = "<b>" . $projectInfo['name'] . "</b><br/>" .
				   $projectInfo['address1'] . "<br/>" .
				   $projectInfo['address2'] . "<br/>" .
				   $projectInfo['city'] . ", " . $projectInfo['state'] . " " . $projectInfo['zip'] ;

		} ELSE {
			$project = "<b>" . $projectInfo['name'] . "</b><br/>" .
				   $projectInfo['address1'] . "<br/>" .
				   $projectInfo['city'] . ", " . $projectInfo['state'] . " " . $projectInfo['zip'] ;
		}	
	
	/* Customer Information */
		IF ($client ['name']=="" AND $client ['attention'] == ""){
			$customer = '--';
  		} ELSE {
        	IF ( $client ['address2']!=""){
        	    $customer = "<b>" . $client ['name'] . " </b> <br/>" .
            	    $client ['address1'] . "<br/>" .
                    $client ['address2'] . "<br/>" .
                    $client ['city'] . ", " . $client ['state'] . " " . $client ['zip'] . "<br/>" .
                    "<b>Attention:</b> " . $client ['attention'] ;
        	} ELSE {
        	    $customer = "<b>" . $client ['name'] . " </b> <br/>" .
                    $client ['address1'] . "<br/>" .
                    $client ['city'] . ", " . $client ['state'] . " " . $client ['zip'] . "<br/>" .
                    "<b>Attention:</b> " . $client ['attention'] ;
        	}
    	}	
		
		/* Architects information */
		IF ( $archInfo ['name']=="" ){
			$architect = '--';
  		} ELSE {
        	IF ( $archInfo ['address2']!="") {
        	    $architect = "<b>" . $archInfo ['name'] . " </b> <br/>" .
            	    $archInfo ['address1'] . "<br/>" .
                    $archInfo ['address2'] . "<br/>" .
                    $archInfo ['city'] . ", " . $archInfo ['state'] . " " . $archInfo ['zip'] ;
        	} ELSE {
        	    $architect = "<b>" . $archInfo ['name'] . " </b> <br/>" .
                    $archInfo ['address1'] . "<br/>" .
                    $archInfo ['city'] . ", " . $archInfo ['state'] . " " . $archInfo ['zip'] ;
        	}
    	}
		
		/* Consultant / Engineering information */
		IF ( $conInfo ['name']=="" ){
       		 $consultant = '--';
  		} ELSE {
        	IF ( $conInfo ['address2']!="") {
        		    $consultant = "<b>" . $conInfo ['name'] . " </b> <br/>" .
            	    	$conInfo ['address1'] . "<br/>" .
                   		$conInfo ['address2'] . "<br/>" .
                    	$conInfo ['city'] . ", " . $conInfo ['state'] . " " . $conInfo ['zip'] ;
        	} ELSE {
        	    $consultant = "<b>" . $conInfo ['name'] . " </b> <br/>" .
                    $conInfo ['address1'] . "<br/>" .
                    $conInfo ['city'] . ", " . $conInfo ['state'] . " " . $conInfo ['zip'] ;
        	}
    	}	
			
		/* General Contractor information */
		IF ( $genInfo ['name']=="" ){
       		 $general = '--';
  		} ELSE {
        	IF ( $genInfo ['address2']!="") {
        		    $general = "<b>" . $genInfo ['name'] . " </b> <br/>" .
            	    	$genInfo ['address1'] . "<br/>" .
                   		$genInfo ['address2'] . "<br/>" .
                    	$genInfo ['city'] . ", " . $genInfo ['state'] . " " . $genInfo ['zip'] ;
        	} ELSE {
        	    $general = "<b>" . $genInfo ['name'] . " </b> <br/>" .
                    $genInfo ['address1'] . "<br/>" .
                    $genInfo ['city'] . ", " . $genInfo ['state'] . " " . $genInfo ['zip'] ;
        	}
    	}	
	
?>


