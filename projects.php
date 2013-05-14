<?php
/*  Auther:
        Lee Hebert

    Version:
        11.4.25.1

    Descrioption:
        Home page for the application.  This pages lists all available stored projects.
			src = ./inc/pages/home.php
*/
	session_start() ; // store session data
    include "./ctrl/ctrl-home.php" ;
	include "./inc/header.php" ; 
    
?>
<div class="container_12" >
	<div class="grid_2">
		<span class="left_heading">Current Projects</span> <br/>
		<p class="button"><a href="new_project_form.php?type=new" id="small">New Project</a>
		</h3></p>
		
	</div>	
	<div class="grid_10">
		<div class="container_12">
			<div class="home_row">
				<div class="grid_10">
				<?php 
					$rows = $read->count - 1 ;
					while ( $c < $rows) {
						$row =	$projectList [$c] ;
						echo '<a href="projectDash.php?id=' . $row ['jobNumber'] . '">' ;
						echo "<b>" . $row ['projectTitle1'] . "</b><br/>" ;
						echo $row ['projectTitle2'] ; 
						echo "</a>" ;
						$c++ ;
					}
				?>
				</div>
			</div>
		</div>
	</div>
</div>
			
	
      
<?php include "./inc/footer.php"; ?>
