<?php
error_reporting(0);
if(isset($_GET['page'])) {
	$page = $_GET['page'];
} else {
	$_GET['page'] = 'dashboard';
}

$page = $_GET['page'];

include('../config/connection.php');
include('functions/data.php');
include('functions/sandbox.php');

$debug = data_settings_value($dbc, "debug-status");

include('config/queries.php');



if(isset($_GET['id'])) {
	if($_GET['page'] == 'users') {
			
		$opened = data_user($dbc, $_GET['id']);
		
	} else {
		
		$opened = data_page($dbc, $_GET['id']);
		
	}					
	
}


$user = data_user($dbc, $_SESSION['username']);

?>
