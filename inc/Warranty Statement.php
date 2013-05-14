<div class="Page">
	<div class="Right Title Padding">
		Warranty Statement
	</div>
</div>


<div class="Page">
		<div class="Title Right Right_Align">Warranty Statement</div>
		<br/>
		<div class="Sub_Title Right Right_Align Padding">
			<b><?php echo $projectInfo ['title1'] ;?><br/>
				<?php echo $projectInfo ['title2']  ;?></b><br/>
				<?php echo date("l, F d, Y") ; ?>
		</div>
		<div class="Box">
			<div class="Left">Project Number:</div>
			<div class="Right"><?php echo $job ; ?></div>
			<div class="Left">Project Manager:</div>
			<div class="Right"><?php echo $projectInfo ['projectManager'] ; ?></div>
			<div class="Left">System Installed:</div>
			<div class="Right"><?php echo $projectInfo ['system'] ; ?></div>
			<div class="Left">Customer</div>
			<div class="Right"><?php echo $customer ; ?></div>
		</div>
		
		<div class="Box">
			<div class="Left">Attention:</div>
			<div class="Right"><?php echo $client['attention'] ; ?></div>
		</div>
		<div class="Box">
			<div class="Right">
				<p>Convergint Technologies, LLC will warrant all goods and services provided in association with the signed contract between Convergint Technologies, LLC and their <u>"Customer"</u> for the installation of the <u>"Installed System"</u> for the period of one (1) year from the Date of Substantial Completion unless otherwise stated in the project specifications. Convergint Technologies obligation is limited to repairing, replacing, or exchanging products and applied labor not in compliance with the aforementioned contract free of charge to the buyer.</p>
			
				<p>Alterations to product or repair service not provided by Convergint Technologies LLC will void all warranties. All warranties are void if a product is damaged, becomes defective or malfunctions due to accident, abuse, vandalism, neglect, lightning, electricity, water, environmental (or other) hazards, or acts of god.</p>

				<p>Your organization has chosen Convergint Technologies because of our commitment to service excellence and a genuine desire to build long term relationships. Near the end of your warranty period, a representative of Convergint Technologies will contact you to discuss ongoing preventative maintenance and service options.</p>

				<p>Additionally, at any time, you may contact your Convergint Technologies representative who would be happy to discuss a preventative maintenance plan.</p>
			</div>
			<div class="Right Small Bottom Right_Align">
			<?php echo $branchInfo; ?>
		</div>
	</div>
</div>
