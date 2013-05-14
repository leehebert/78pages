<?php 
	include "./ctrl/ctrl-addBom.php";
	include "./inc/header.php"; 
?>

<div class="container_12">
	<div class="grid_2">
		<h2>Parts</h2> 
	</div>
	<div class="grid_10">
		<div class="bom">
			<table>
				<tr>
					<td class="mfg" > <b>Mfg</b> </td>
					<td class="partNumber" ><b>Part Number</b></td>
					<td class="desc" ><b>Description</b> </td>								
				</tr>
<?php FOREACH ($partsList AS $value) { ?>
				<tr>
					<td class="mfg" ><?php echo $value ['mfg'] ; ?></td> 
					<td class="partNumber" ><?php echo $value ['partNumber'] ; ?></td>
					<td class="desc" ><?php echo $value ['description'] ; ?></td> 
				</tr>
<?php } ?>
			</table> 
		</div>
	</div>
</div>

	
<?php	
	include "./inc/footer.php";
 ?>