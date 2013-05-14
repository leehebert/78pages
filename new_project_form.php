<?php
include "./ctrl/ctrl-new_project_form.php" ;
include "./inc/header.php" ;
IF ($_GET ['type'] == "new") {
	$type = "New Project Info" ;
	} ELSE {
	$type = "Edit Project Info" ;
	$job = $_GET ['job'] ;
	require './class/class-read.php' ;
	$read = new read ;
	$read->site($job) ;
	$site = $read->result ;
	$read->client($job) ;
	$client = $read->result ;
} 
?>
	<div class="container_12">
		<h1><?php echo $type ; ?></h1>
		</br>
		<div class="grid_6">	
			<div class="title" >Step 1</div>
			<h2>Site</h2>
		</div>
		<div class="grid_6">
			<div class="title">Step 2</div> 
			<h2>Customer</h2>
		</div>
	</div>
	<div class="clear"></div> 
	</br></br>
	<div class="container_12"> 
		<div class="grid_6"> 
			<form method="post" action="./ctrl/ctrl-new_project.php">
				<p>Project Number: </br>
					<input 
						type="text" 
						size="45" 
						name="jobNumber" 
						<?php 
							IF (isset($job)) {
								echo 'value="'.$job.'"'  ;
							}
						?>
					/>
				<p></br>
					
				<p>End User Name: </br>
					<input 
						type="text" 
						size="45" 
						name="projectTitle1" 
						<?php 
							IF (isset($job)) {
								echo 'value="'.$site ['title1'].'"' ;
							}
						?>
					/>
				</p></br>
					
				<p>Job Description: </br>
					<input 
						type="text" 
						size="45" 
						name="projectTitle2"
						<?php 
							IF (isset($job)) {
								echo 'value="'.$site ['title2'].'"' ;
							}
						?>
					/>
				</p></br>
				
				<p>System Type: </br>
					<input 
						type="text" 
						size="45" 
						name="systemType"
						<?php 
							IF (isset($job)) {
								echo 'value="'.$site ['system'].'"' ;
							}
						?>
					/>
				</p></br>
				
				<p>Specification #: </br>
					<input 
						type="text" 
						size="45" 
						name="specificationSection"
						<?php
							IF (isset($job)) {
								echo 'value="'.$site ['spec'].'"' ;
							}
						?>
					/>
				</p></br>
				
				<p>Address Name: </br>
					<input
						type="text"
						size="45"
						name="addressTitle"
						<?php
							IF (isset($job)) {
								echo 'value="'.$site ['name'].'"' ;
							}
						?>
					/>
				</p></br>
				
				<p>Project Address: </br>
					<input
						type="text"
						size="45"
						name="address1"
						<?php 
							IF (isset($job)) {
								echo 'value="'.$site ['address1'].'"' ;
							}
						?>
					/>
				</p></br>
				
				<p>Suite or Building #: </br>
					<input 
						type="text" 
						size="45" 
						name="address2"
						<?php 
							IF (isset($job)) {
								echo 'value="'.$site ['address2'].'"' ;
							}
						?>
					/>
				</p></br>
				
				<p>City: </br>
					<input 
						style ="margin-right:10px;" 
						size="45" 
						type="text" 
						name="city" 
						<?php 
							IF (isset($job)) {
								echo 'value="'.$site ['city'].'"' ;
							}
						?>
					/>
				</p></br>
				
				<p>State, Zip: </br>
					<input 
						style ="margin-right:10px;" 
						size="2" 
						type="text" 
						name="state"
						<?php 
							IF (isset($job)) {
								echo 'value="'.$site ['state'].'"' ;
							}
						?>
					/>
					
					<input 
						style ="margin-right:10px;" 
						size="5" 
						type="text" 
						name="zip"
						<?php 
							IF (isset($job)) {
								echo 'value="'.$site ['zip'].'"' ;
							}
						?>
					/>
				</p></br>
		</div>
		<div class="grid_6" >
			<p>CompanyName: </br>
				<input 
					type="text" 
					size="45" 
					name="submitToName" 
					<?php 
						IF (isset($job)) {
							echo 'value="'.$client ['name'].'"' ;
						}
					?>
				/>
			</p></br>
			
			<p>Address: </br>
				<input 
					type="text" 
					size="45" 
					name="submitToAddress1" 
					<?php 
						IF (isset($job)) {
							echo 'value="'.$client ['address1'].'"' ;
						}
					?>
				/>
			</p></br>
			
			<p>Suite or Building #: </br>
				<input 
					type="text" 
					size="45" 
					name="submitToAddress2" 
					<?php 
						IF (isset($job)) {
							echo 'value="'.$client ['address2'].'"' ;
						}
					?>
				/>
			</p></br>
			
			<p>City: </br>
				<input 
					style ="margin-right:10px;" 
					size="45" 
					type="text" 
					name="submitToCity" 
					<?php 
						IF (isset($job)) {
							echo 'value="'.$client ['city'].'"' ;
						}
					?>
				/>
			</p></br>
			
			<p>State, Zip: </br>
				<input 
					style ="margin-right:10px;" 
					size="2" 
					type="text" 
					name="submitToState" 
					<?php 
						IF (isset($job)) {
							echo 'value="'.$client ['state'].'"' ;
						}
					?>
				/>
				
				<input 
					style ="margin-right:10px;" 
					size="5" 
					type="text" 
					name="submitToZip" 
					<?php 
						IF (isset($job)) {
							echo 'value="'.$client ['zip'].'"' ;
						}
					?>
				/>
			</p></br>
				
			<p>Attention: </br>
				<input 
					style ="margin-right:10px;" 
					size="45" 
					type="text" 
					name="submitToAttention" 
					<?php 
						IF (isset($job)) {
							echo 'value="'.$client ['attention'].'"' ;
						}
					?>
				/>
			</p> 
		</div> 
	</div>
	<div class="container_12">
		<div class="prefix_8 grid_4"> 
				<input 
					class="form_button" 
					type="submit" 
					name="submit" 
					<?php 
						IF (isset($job)) {
							echo 'value="Update"' ;
						} ELSE {
							echo 'value="Next"' ;
						}
					?>
				/>
				
				<input 
					class="form_button" 
					type="button" 
					name="cancel" 
					value="Cancel" 
				/>
			</form>
		</div>
	</div>


