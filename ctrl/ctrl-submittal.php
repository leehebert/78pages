<?php
/*  Auther:
        Lee Hebert

    Version:
        11.4.25.1

    Descrioption:
        Controller for submittal.php

*/
	//Assisgns the job number to a variable
    $job = $_GET['job'] ;
	
	/* The following sets up variables used in the page */
	$title = $job . " Submittal" ;    // sets the title for the header
	
	
	
	   /////////////////////////////////////////////////////////////////
	  //  This little chunk sets up the project class and assigns    //
	 //  the result to variables for use throughout this controller //
	/////////////////////////////////////////////////////////////////
	
	
	require "./class/class-read.php" ;
	$read = new read ;
	
	/* Branch Info */
		$read->branch () ;
		$branch = $read->result ;
		
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
		$bom = $read->result ;
		$bomCount = $read->count - 1 ;
		
		
	  /////////////////////////////////////////////////////	
	 //  now we format the variables for the submittal  //
	/////////////////////////////////////////////////////
   

    /* Sets the $project Variable */
    IF ( $projectInfo ['address2']!=""){
        $project = "<b>". $projectInfo['name']."</b><br/>".
               $projectInfo['address1']."<br/>".
               $projectInfo['address2']."<br/>".
               $projectInfo['city'].", ".$projectInfo['state']." ".$projectInfo['zip'];

    } ELSE {
        $project = "<b>". $projectInfo['name']."</b><br/>".
               $projectInfo['address1']."<br/>".
               $projectInfo['city'].", ".$projectInfo['state']." ".$projectInfo['zip'];
    }

     ///////////////////////////////////////////////////////
    //// Select query to grab the customer information ////
   ///////////////////////////////////////////////////////
   
    IF ( $client ['name']=="" AND $client ['attention'] == ""){
        $customer = 'No customer information has been stored<br/>
                    <form method="post" action="./update/index.php">
                    <input type="submit" name="job" value="'.$job.'-cust" /></form>';
    } ELSE {
        IF ( $client ['address2']!=""){
            $customer = "<b>". $client ['name']." </b> <br/>".
                        $client ['address1']."<br/>".
                        $client ['address2']."<br/>".
                        $client ['city'].", ".$client ['state']." ".$client ['zip']."<br/>";
        } ELSE {
            $customer = "<b>".$projectInfo['name']." </b> <br/>".
                        $projectInfo['address1']."<br/>".
                        $projectInfo['city'].", ".$projectInfo['state']." ".$projectInfo['zip']."<br/>";
        }
    }

     ///////////////////////////////////////////////////
    //// Select query to grab the Arch information ////
   ///////////////////////////////////////////////////

    IF ($archInfo['name']=="" AND $archInfo['zip'] == ""){
        $architect = "--";
    } ELSE {
        IF ( $archInfo['address2']!=""){
            $architect = "<b>".$archInfo['name']." </b> <br/>".
                        $archInfo['address1']."<br/>".
                        $archInfo['address2']."<br/>".
                        $archInfo['city'].", ".$archInfo['state']." ".$archInfo['zip'];
        } ELSE {
            $architect = "<b>".$archInfo['name']." </b> <br/>".
                        $archInfo['address1']."<br/>".
                        $archInfo['city'].", ".$archInfo['state']." ".$archInfo['zip'];
        }
    }

	
      ////////////////////////////////////////////////////////
     /// Select query to grab the Consultant information ////
    ////////////////////////////////////////////////////////


    IF ($conInfo['name']=="" AND $conInfo['zip'] == ""){
        $consultant = "--";
    } ELSE {
        IF ( $conInfo['address2']!=""){
            $consultant = "<b>".$conInfo['name']." </b> <br/>".
                        $conInfo['address1']."<br/>".
                        $conInfo['address2']."<br/>".
                        $conInfo['city'].", ".$conInfo['state']." ".$conInfo['zip'];
        } ELSE {
            $consultant = "<b>".$conInfo['name']." </b> <br/>".
                        $conInfo['address1']."<br/>".
                        $conInfo['city'].", ".$conInfo['state']." ".$conInfo['zip'];
        }
    }
	
	
      ////////////////////////////////////////////////
     /// Select query to grab the GC information ////
    ////////////////////////////////////////////////

	
    IF ($genInfo['name']=="" AND $genInfo['zip'] == ""){
        $general = '--';
    } ELSE {
        IF ( $genInfo['address2']!=""){
            $general = "<b>".$genInfo['name']." </b> <br/>".
                        $genInfo['address1']."<br/>".
                        $genInfo['address2']."<br/>".
                        $genInfo['city'].", ".$genInfo['state']." ".$genInfo['zip'];
        } ELSE {
            $general = "<b>".$genInfo['name']." </b> <br/>".
                        $genInfo['address1']."<br/>".
                        $genInfo['city'].", ".$genInfo['state']." ".$genInfo['zip'];
        }
    }

	  ///////////////////////////////////////////////////
     /// Select query to grab the Table of Contents ////
    ///////////////////////////////////////////////////

	
	
      /////////////////////////////////////////////////
     /// Select query to grab the BOM information ////
    /////////////////////////////////////////////////

 /*        $bom= 0;
    } ELSE {
	
	$bom=1;
    $bomResult = $query->result;
	}
	
	$bomItem = 1;
	$exists = "";
	$dataSheet = "";
	$files_to_zip = array ();
	$name = array ();
	$equipment = array ();
	while ($row = mysql_fetch_assoc($bomResult)) {
		$dataSheet = "../../../resources/" . $row ['mfg'] . "/" . $row ['partNumber'] ."/ds_" . $row ['partNumber'] . ".pdf";
		
		if (file_exists($dataSheet)) {
			$files_to_zip[] = $dataSheet; 
		} else {
			$exists = "*";
		}
		
		$name[] = "ds_" .$row ['partNumber']. ".pdf";
		if (is_int($bomItem / 2) == True) {
			$equipment []= 
				'<li class="even">
					<ul>
						<li class="R1">' . $bomItem . '</li>
						<li class="R2">' . $row ['qty'] . '</li>
						<li class="R3">' . $row ['partNumber'] . $exists . '</li>
						<li class="R4">' . $row ['mfg'] . '</li>
						<li class="R5">' . $row ['description'] . '</li>
					</ul>
				</li>';
		} else {
			$equipment []= 
				'<li>
					<ul>
						<li class="R1">' . $bomItem . '</li>
						<li class="R2">' . $row ['qty'] . '</li>
						<li class="R3">' . $row ['partNumber'] . $exists . '</li>
						<li class="R4">' . $row ['mfg'] . '</li>
						<li class="R5">' . $row ['description'] . '</li>
					</ul>
				</li>';
		}
		$bomItem++;
	} */
	
      //////////////////////////////////////////////////////////
     /// Select query to grab the Users Branch Information ////
    //////////////////////////////////////////////////////////

    IF ( $branch ['address2']!=""){
            $branchInfo = "<b>".$branch['name']."</b><br/>".
                        $branch['address1'].", ".$branch['address2']."<br/>".
                        $branch['city'].", ".$branch['state']." ".$branch['zip']."<br/> P: ". 
						$branch['phone'].'<br/>F: '.$branch['fax']."</span>";
        } ELSE {
            $branchInfo = "<b>".$branch['name']."</b><br/>".
                        $branch['address1']."<br/>".
                        $branch['city'].", ".$branch['state']." ".$branch['zip']."<br/> P: ". 
						$branch['phone'].'<br/>F: '.$branch['fax']."</span>";
        }
		
      ////////////////////////////////////////////////////////
     /// Section for creating a Zip File for Data Sheets ////
    ////////////////////////////////////////////////////////	
		
/* 	$zip = new ZipArchive();
					
	$filename = '../../../resources/zip_files/' . $job . '_datasheets.zip';
	$count=0;
	$num=1;
	$zip->open($filename, ZIPARCHIVE::CREATE | ZIPARCHIVE::OVERWRITE );
	foreach ($files_to_zip as $value) {
		$zip->addFile($value, $num. "_" .$name[$count]);
		$count++; $num++;
	}
	$zip->close(); */
    

?>


