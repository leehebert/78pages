<div class="Page">
	<div class="Right Title Padding">
		System Bill of Materials
	</div>
</div>

<div class="Page">
	<div class="Title Right Right_Align">System Bill of Materials</div>
	<br/>
	<div class="Sub_Title Right Right_Align Padding">
		<b><?php echo $projectInfo ['title1'] ;?><br/>
			<?php echo $projectInfo ['title2']  ;?></b><br/>
			<?php echo date("l, F d, Y") ; ?>
	</div>
	<div class="bom">
		<ul>
			<li class="Header_Row">
				<ul>
					<li class="R1">Item</li>
					<li class="R2">Qty</li>
					<li class="R3">Part #</li>
					<li class="R4">Mfg</li>
					<li class="R5">Description</li>
				</ul>
			</li>
			<?php 
				foreach ($bom as $value) {
					echo $value;
				}
			?>
			<li style="font-weight:italic;">* Indicates equipment without manufacturer datasheets</li>
		</ul>
	</div>
</div>