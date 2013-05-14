<?PHP 
	include "./ctrl/ctrl-submittal.php" ;
	include "./inc/print-header.php" ; 

?>
<body>
	<div class="container_12">
	<div class="Page">
		<div class="V_Line"></div>
		<div class="Right Title">
			<span class="title"><?php echo $projectInfo ['title1'] ;?></span><br/>
			<span class="h2"><?php echo $projectInfo ['title2']  ;?></span>
		</div>
		<div style="margin-bottom:2.5in;"class="Right Sub_Title">
			<b><?php echo $projectInfo ['system'] ?></b><br/>
			System Submittal<br/>
			<?php IF ($projectInfo ['spec'] =="") {
					echo "";
				} ELSE {
					echo "Specification Section: " . $projectInfo ['spec'] . "<br/>"; 
				}?>
				<?php echo date("l, F d, Y") ; 
				?>
		</div>
		<div class="Box">
			<div class="Left ">Project Address:</div>
			<div class="Right "><?php echo $project; ?></div>
		</div>
		<div class="Box">
			<div class="Left ">Architect:</div>
			<div class="Right "><?php  echo $architect ; ?></div>
		</div>
		<div class="Box">
			<div class="Left ">Engineering Consultant:</div>
			<div class="Right "><?php  echo $consultant ; ?></div>
		</div>
		<div class="Box">
			<div class="Left ">General Contractor:</div>
			<div class="Right "><?php  echo $general ; ?></div>
		</div>
		<div class="Box">
			<div class="Left ">Submit To:</div>
			<div class="Right "><?php  echo $customer ; ?></div>
			<div class="Left ">Attention:</div>
			<div class="Right "><b><?php echo $client ['attention'] ; ?></b></div>
		</div>
		<div class="Box">
			<div class="Left ">Prepared By:</div>
			<div class="Right "><?php echo $branchInfo ; ?></div>
			<div class="Left ">Project Number:</div>
			<div class="Right "><?php echo $job ; ?></div>
			<div class="Left ">Project Manager:</div>
			<div class="Right "><?php echo $projectInfo ['projectManager'] ; ?></div>
			<div class="Left ">Systems Designer:</div>
			<div class="Right "><?php echo $projectInfo ['projectDesigner'] ; ?></div>
		</div>
	</div>
	
	
	<div class="Page">
		<div class="Right Title Padding">
			Table of Contents 
		</div>
		<div style="height:2in; "></div>
			<?php  
			
				$c = 0;
				
				$include = array();
				while ($c < $tocCount) { 
					$row = $toc [$c] ;
					IF ($row ['include'] == 'checked') { 
						$c++ ;
						echo 
						'<div class="Box">
						<div class="Left Box"><b>' . $c . '</b></div>
						<div class="Right Text">' . $row ['tab'] . '</div>
						</div>';
						$include[] = $row ['tab'];
					}
				}
			
			?>
	</div>	
		
		
	<?php
		$stop = 0;
		WHILE ($c > $stop) {
			
			include "./inc/" . $include [$stop] . ".php" ;
			$stop++ ;
			
		}?>
				
	
		
	</div>
		<?php include "./inc/print-footer.php" ; ?>
</body>
</html>
		
