<div style="display: none;">
	<div id="New_Project">
  		<h1>Create a New Project</h1>
        <h3 style="color:red;"><?php if (isset($_POST['pass'])) echo $error; ?></h3>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <p>Job Number: <input type="text" name="job" /></p>
            <p>Project Name 1: <input type="text" name="name1" /></p>
			<p>Project Name 2: <input type="text" name="name2" /></p>
			<p>System Type: <input type="text" name="system" /></p>
			<p>Specification Section: <input type="text" name="spec" /></p>
			<p>Project Manager: <input type="text" name="manager" /></p>
			<p>Project Designer: <input type="text" name="designer" /></p>
			<p>Address Title: <input type="text" name="title" /></p>
			<p>Address 1: <input type="text" name="address1" /></p>
			<p>Address 2: <input type="text" name="address_2" /></p>
			<p>city: <input style ="margin-right:10px;" type="text" name="city" />
				state: <input style ="margin-right:10px;" type="text" size="2" name="state" />
				zip: <input style ="margin-right:10px;" type="text" size="5" name="zip" /></p>
            <p><input type="submit" name="submit" value="Create" />
			<a href="#"><input type="button" name="cancel" value="Cancel" /></a></p>
        </form>
	</div>
</div>

<script type="text/javascript">
	FancyZoomBox.directory = '<?php echo $imgSrc;?>img';
	$(document).observe('dom:loaded', function() {
		new FancyZoom('small', {width:600, height:400});
	});
</script>