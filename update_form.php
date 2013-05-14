<?php
include "./ctrl/ctrl-update_form.php" ;
include "./inc/header.php" ;
?>
	<div class="grid_12">
		<div class="grid_5">
			<h2>Select<?php echo $indefiniteArticles . $type; ?></h2>
			<div class="home_row"  > 
				<div>
				<?php 
					FOREACH ( $newList AS $value) {
						echo '<a href="ctrl/ctrl-update.php?type=' . $table . '&id=' . $value ['id'] . '&job=' . $job . '" >' ;
						echo "<b>" . $value ['name'] . "</b><br/>" ;
						echo $value ['address1'] . ", " . $value ['city'] . ", " . $value ['state'] ;
						echo "</a>" ;
						$c++ ;
					} 
				?>
				</div>
			</div>
		</div>
		<div class="grid_2 h1">OR</div>
		<div class="grid_4">
			<div id="Update">
				<h2>Add<?php echo $indefiniteArticles . $type; ?></h2>
				<form method="post" action="./ctrl/ctrl-update.php">
					<p>Name: </br><input type="text" name="name" data-hint="Name"/></p>
					<p>Address 1: </br><input type="text" name="address1" data-hint="Address 1"/></p>
					<p>Address 2: </br><input type="text" name="address2" data-hint="Address 2"/></p>
					<p>City: </br><input style ="margin-right:10px;" type="text" name="city" data-hint="City"/></p>
					<p>State: </br><input style ="margin-right:10px;" type="text" size="2" name="state" data-hint="State"/></p>
					<p>Zip: </br><input style ="margin-right:10px;" type="text" size="5" name="zip" data-hint="Zip"/></p>
					<input type="hidden" name="job" value="<?php echo $job; ?>"/>
					<input type="hidden" name="table" value="<?php echo $table; ?>" />
					<input class="form_button" type="submit" name="submit" value="Update" />
					<input class="form_button" type="button" name="cancel" value="Cancel" />
				</form>
			</div>
		</div>
	</div>

