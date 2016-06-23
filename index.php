<?php include ('config/connection.php'); ?>
<?php include('config/setup.php'); ?>

<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Dynamic</title>	
		
		<?php include('config/css.php'); ?>
		<?php include('config/js.php'); ?>	
	</head>
	
	<body>
		
		<?php include('templates/navigation.php'); ?>
		
		<div class="container">
			<h1><?php echo $page['header']; ?></h1>
			<p><?php echo $page['body']; ?></p>
		</div>
		
		<?php include('templates/footer.php'); ?>
		
		<?php if($debug == 1) {
			include('widgets/debug.php'); 
		} ?>
		 
	</body>
	
</html>