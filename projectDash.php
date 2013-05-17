<?PHP 
	$_SESSION['job'] = $_GET ['id'] ;
    include "./ctrl/ctrl-project.php";
	include "./inc/header.php"; 
    
?>


			
<div class="container_12">
	<div id="pageTitle" class="grid_12" >
		<span class="title"><?php echo $projectInfo ['title1'] ;?></span><br/>
   		<span class="h2"><b><?php echo $projectInfo ['title2']  ;?></b></span><br/>
		<span class="h3"><?php echo $job ; ?></span><br/> 
	</div>
	<div class="clear"></div>
			
	<div class="grid_12 button">
		<a href="./O&M/" />O & M</a>
		<a href="submittal.php/?job=<?php echo $job ?>">Submittal</a>
	</div>				
	<div class="clear"></div>								
</div>	

<div class="container_12">
	<div class="clear" ></div>
	<!-- ------------------- -->
	<!--                     -->
	<!-- Project Information -->
	<!--                     -->
	<!-- ------------------- -->
			
	<div class="grid_2 left h2 section" >
		Project Information
	</div>
	<div class="grid_10">
		<div class="container_12">
			<div class="grid_1 sec188*/-**//*8//*/8/7
				<div class="dash_icon site"></div>
			</div>
			<div class="grid_4 section">
				<a href="new_project_form.php?type=edit&job=<?php echo $job ;?>" class="edit"> </a>
				<h3 class="red_heading h3">Project Address</h3>
				<div class="body"><?php echo $project; ?>  </div>
			</div>
					
			<div class="grid_1 section" >
				<div class="dash_icon general"></div>
			</div>
			
			<div class="grid_4 section">
				<a href="update_form.php?job=<?php echo $job ; ?>&type=General Contractor" class="edit"> </a>
				<h3 class="red_heading">General Contractor</h3>
				<div class="info"><?php  echo $general ; ?></div>
			</div>
					
			<div class="clear" ></div>
					
			<div class="grid_1 section" >
				<div class="dash_icon architect"></div>				
			</div> 
			
			<div class="grid_4 section">
					<a href="update_form.php?job=<?php echo $job ; ?>&type=Architect" class="edit"> </a>
						<h3 class="red_heading">Architect</h3>
						<div class="info"><?php  echo $architect ; ?></div>
					</div>
					
					<div class="grid_1 section" >
						<div class="dash_icon submit_to"></div>
						</div>
					<div class="grid_4 section">
						 <a href="new_project_form.php?type=edit&job=<?php echo $job ;?>" class="edit"> </a>
						 <h3 class="red_heading">Submit To</h3>
						<div class="info"><?php  echo $customer ; ?></div>
					</div>
				
					<div class="clear" ></div>	
					
					<div class="grid_1 section" >
						<div class="dash_icon consultant"></div>			
					</div>
					<div class="grid_4 section">
						<a href="update_form.php?job=<?php echo $job ; ?>&type=Consultant" class="edit"> </a>
						<h3 class="red_heading">Engineering Consultant</h3>
						<div class="info"><?php  echo $consultant ; ?></div>
					</div>
				</div>
			</div>	
			
			<div class="clear"></div>
			<div class="break"></div>
			
			<!-- ----------------- -->
			<!--                   -->
			<!-- Table of Contents -->
			<!--                   -->
			<!-- ----------------- -->
			
			<div class="grid_2 left h2">
				Table of Contents
			</div>
			<div class="prefix_1 grid_9">
				<div class="container_12">
					<div class="grid_6">
					<?php 
                        $count = 0;
    while ($count < 9 ) {
        $row = $toc [$count];
        echo $row ['tab'] . " = " . $row ['include'] ;
        echo "</br>";
        $count = $count+1;
        }
                    ?>
					</div>
					<div class="grid_2 options">
						
					</div>
				</div>
			</div>
			
			<div class="clear"></div>	
			<div class="break"></div>
			
			<!-- ----------------- -->
			<!--                   -->
			<!-- Bill of materials -->
			<!--                   -->
			<!-- ----------------- -->
			
			<div class="grid_2">
				<div class="container_2">
					<div class="grid_2 left h2">
						Bill of Materials<br/>
					</div>
					<div class="clear"></div>
					<div class="grid_2 left">
						<a href="addBom.php?id=<?php echo $projectInfo ['id'] ;?>&job=<?php echo $job ;?>" class="button" />Add Parts</a>						
					</div>
					<div class="clear"></div>
				</div>
 			</div>
			
			
			<div class="prefix_1 grid_9">
			       		 <div class="bom">
							<table>
								<tr>
									<td class="partNumber" ><b>Part Number</b></td>
									<td class="qty" ><b>Qty</b></td>
									<td class="mfg" > <b>Mfg</b> </td>
									<td class="desc" ><b>Description</b> </td>								
								</tr>
							</table>
						</div>
							
								<?php 
                                $line_count = count($bom) ;
                                $line_item = 0 ;
                                while ($line_item < $line_count) {
                                    $current_item = $bom [$line_item] ;
                                 ?>
						<div class="bom" >
							<table>
									<tr>
										<td class="partNumber" ><?php echo $current_item ['part_number'] ; ?></td>
										<td class="qty" ><?php echo $current_item ['qty'] ; ?></td>
										<td class="mfg" ><?php echo $current_item ['mfg'] ; ?></td> 
										<td class="desc" ><?php echo $current_item ['description'] ; ?></td> 
									</tr>
								</table> 
						</div>
								<?php  
                                    $line_item = $line_item+1 ;
                                } 
								?>
			</div>
      			  

			
			
			<div class="clear"></div>
			<div class="break"></div>
	</div>
        <?php include "./inc/footer.php";?>	
