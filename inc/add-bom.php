<div style="display: none;">

	<div id="new_bom">
		<iframe src="../../../inc/pages/rpc.php" width="600" height="400"></iframe>
	</div>
</div>

<script type="text/javascript">
	FancyZoomBox.directory = '<?php echo $imgSrc;?>img';
	$(document).observe('dom:loaded', function() {
		new FancyZoom('small', {width:600, height:400});
	});
</script>