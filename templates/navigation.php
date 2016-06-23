<nav class="navbar navbar-default" role="navigation">
	<?php if($debug == 1) { ?>
		<button id="btn-debug" class="btn btn-default"><i class="fa fa-bug"></i></button>
	 <?php } ?>
	 
		<div class="container">
			<ul class="nav navbar-nav">
					
				<?php include('functions/template.php'); ?>
					
				<?php nav_main($dbc, $path); ?>
					
				<!--<li><a href="?page=5">Page 5</a></li>
				<li><a href="?page=6">Page 6</a></li>-->
			</ul>
		</div>
		
</nav>