<?php
/*  Auther:
        Lee Hebert

    Version:
        11.4.25.1

    Descrioption:
        Controller for ./inc/pages/project.php

*/
	/* Assigns the CSS style for the page */
	$style="web";

    //Assisgns the job number to a variable
    $job = $_GET['id'];
	
	/* This little chunk sets up the query class and assigns a variable to use throughout the controller */
	require "../../classes/query.class.php" ;
	$query = new query ;
	
	/* The following sets up variables used in the page */
	$imgSrc = "../../"; 
	$id = $_COOKIE ['id'] ;
	$userDb = "78P_".$id ;
	$publicDb = "78P_public" ;
	$title = "78Pages Project - ".$job;    // sets the title for the header
	$divide = 0;



    //Select query to grab the project ID
    $query->select ( "$userDb" , "projects", "id",  "jobNumber = '$job' " );
    $projectId = mysql_fetch_assoc($query->result);


     ////////////////////////////////////////////////////////////////////////////////
    //// Select query to grab the project information ////
   ///////////////////////////////////////////////////////////////////////////////
    $query->select ( "$userDb" , "projects", "*" , "jobNumber = '$job' " );
    $projectInfo = mysql_fetch_assoc($query->result);

    //Sets the $project Variable
    IF ( $projectInfo ['projectaddress2']!=""){
        $project = "<strong>". $projectInfo['projectAddressTitle']."</strong><br/>".
               $projectInfo['projectaddress1']."<br/>".
               $projectInfo['projectaddress2']."<br/>".
               $projectInfo['city'].", ".$projectInfo['state']." ".$projectInfo['zip'];

    } ELSE {
        $project = "<strong>". $projectInfo['projectAddressTitle']."</strong><br/>".
               $projectInfo['projectaddress1']."<br/>".
               $projectInfo['city'].", ".$projectInfo['state']." ".$projectInfo['zip'];
    }

     ////////////////////////////////////////////////////////////////////////////////////
    //// Select query to grab the customer information ////
   ////////////////////////////////////////////////////////////////////////////////////
    IF ($projectInfo['submitToName']=="" AND $projectInfo['submitToAttention'] == ""){
        $customer = 'No customer information has been stored<br/>
                    <form method="post" action="./update/index.php">
                    <input type="submit" name="job" value="'.$job.'-cust" /></form>';
    } ELSE {
        IF ( $projectInfo['submitToAddress2']!=""){
            $customer = "<strong>".$projectInfo['submitToName']." </strong> <br/>".
                        $projectInfo['submitToAddress1']."<br/>".
                        $projectInfo['submitToAddress2']."<br/>".
                        $projectInfo['submitToCity'].", ".$projectInfo['submitToState']." ".$projectInfo['submitToZip']."<br/>".
                        "<strong>Attention:</strong>: ".$projectInfo['submitToAttention'];
        } ELSE {
            $customer = "<strong>".$projectInfo['submitToName']." </strong> <br/>".
                        $projectInfo['submitToAddress1']."<br/>".
                        $projectInfo['submitToCity'].", ".$projectInfo['submitToState']." ".$projectInfo['submitToZip']."<br/>".
                        "<strong>Attention:</strong>: ".$projectInfo['submitToAttention'];
        }
    }

     ////////////////////////////////////////////////////////////////////////////
    //// Select query to grab the Arch information ////
   ////////////////////////////////////////////////////////////////////////////
    $arch = $projectInfo ['architect'] ;
	$query->select ( "$publicDb" , "architect", "*" , "id = ' $arch ' " );
    $archInfo = mysql_fetch_assoc($query->result);

    IF ($archInfo['archName']=="" AND $archInfo['archZip'] == ""){
        $architect = '<form method="post" action="./update/index.php">
                     No Architect information has been stored<br/>
                     <input type="submit" name="'.$job.'-arch" value="Enter Architect Information" />
                 </form>';
    } ELSE {
        IF ( $archInfo['archAddress2']!=""){
            $architect = "<strong>".$archInfo['archName']." </strong> <br/>".
                        $archInfo['archAddress1']."<br/>".
                        $archInfo['archAddress2']."<br/>".
                        $archInfo['archCity'].", ".$archInfo['archState']." ".$archInfo['archZip'];
        } ELSE {
            $architect = "<strong>".$archInfo['archName']." </strong> <br/>".
                        $archInfo['archAddress1']."<br/>".
                        $archInfo['archCity'].", ".$archInfo['archState']." ".$archInfo['archZip'];
        }
    }

	
      /////////////////////////////////////////////////////////////////////////////////////
     /// Select query to grab the Consultant information ////
    /////////////////////////////////////////////////////////////////////////////////////
    $con = $projectInfo ['consultant'] ;
	$query->select ( "$publicDb" , "consultant", "*" , "id = ' $con ' " );
    $conInfo = mysql_fetch_assoc($query->result);

    IF ( $conInfo ['conName']=="" AND $conInfo['conZip'] == ""){
        $consultant = '<form method="post" action="./update/index.php">
                    No Consultant information has been stored<br/>
                    <input type="submit" name="'.$job.'-Con" value="Enter Consultant Information" />
                </form>';
    } ELSE {
        IF ( $conInfo['conAddress2']!=""){
            $consultant = "<strong>".$conInfo['conName']." </strong> <br/>".
                        $conInfo['conAddress1']."<br/>".
                        $conInfo['conAddress2']."<br/>".
                        $conInfo['conCity'].", ".$conInfo['conState']." ".$conInfo['conZip'];
        } ELSE {
            $consultant = "<strong>".$conInfo['conName']." </strong> <br/>".
                        $conInfo['conAddress1']."<br/>".
                        $conInfo['conCity'].", ".$conInfo['conState']." ".$conInfo['conZip'];
        }
    }
	
	
      /////////////////////////////////////////////////////////////////////////
     /// Select query to grab the GC information ////
    /////////////////////////////////////////////////////////////////////////
    $gen = $projectInfo ['general'] ;
	$query->select ( "$publicDb" , "general", "*" , "id = ' $gen ' " );
    $genInfo = mysql_fetch_assoc($query->result);
	
    IF ($genInfo['genName']=="" AND $genInfo['genZip'] == ""){
        $general = '<form method="post" action="./update/index.php">
                    No General Contractor information has been stored<br/>
                    <input type="submit" name="'.$job.'-arch" value="Enter General Contractors Information" />
                </form>';
    } ELSE {
        IF ( $genInfo['genAddress2']!=""){
            $general = "<strong>".$genInfo['genName']." </strong> <br/>".
                        $genInfo['genAddress1']."<br/>".
                        $genInfo['genAddress2']."<br/>".
                        $genInfo['genCity'].", ".$genInfo['genState']." ".$genInfo['genZip'];
        } ELSE {
            $general = "<strong>".$genInfo['genName']." </strong> <br/>".
                        $genInfo['genAddress1']."<br/>".
                        $genInfo['genCity'].", ".$genInfo['genState']." ".$genInfo['genZip'];
        }
    }

	  /////////////////////////////////////////////////////////////////////////////
     /// Select query to grab the Table of Contents ////
    /////////////////////////////////////////////////////////////////////////////
	$projId = $projectInfo ['id'] ;
	$query->select ( "$userDb" , "toc", "*" , "projectId = '$projId'" ) ;
    $tocResult = $query->result ;

	
      ////////////////////////////////////////////////////////////////////////////
     /// Select query to grab the BOM information ////
    ////////////////////////////////////////////////////////////////////////////
	
	$query->select ( "$userDb" , "bom", "*" , "projectId = '$projId'" ) ;
	IF (mysql_num_rows($query->result)<1) {
        $bom= 0;
    } ELSE {
	
	$query->leftJoin ( "$userDb" , "bom", " 78P_public.parts.partNumber, 78P_public.parts.mfg, 78P_public.parts.description, qty" , "projectId = '$projId'" , "78P_public.parts ON partId = 78P_public.parts.id") ;	
	$bom=1;
    $bomResult = $query->result;
	}
	
	$query->selectSimple ("$publicDb" , "parts"  , "partNumber" );
	$partList = $query->result;
	$sCount = mysql_num_rows($query->result);
	$count = 1;
	$source = "";
	while ($row = mysql_fetch_assoc($partList)) { 
		if ($count == $sCount) {
			$source = $source . '"' . $row ['partNumber'] . '"' ; 
		} else {
			$source = $source . '"' . $row ['partNumber'] . '" , ' ; 
		}
		$count++;
	}
?>