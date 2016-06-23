<?php

session_start();

if(!isset($_SESSION['username'])) {
	
	header('Location: login.php');
	
}

?>

<?php include('config/setup.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Admin site</title>	
		
		<?php include('config/css.php'); ?>
		<?php include('config/js.php'); ?>	
	</head>
	
	<body>
		
		<?php include('templates/navigation.php'); ?>