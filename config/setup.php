<?php
error_reporting(1);

if($path['call_parts'][0] == '') {	
	$path['call_parts'][0] = 'home';
} 

$pageid = $_GET['page'];

include('config/connection.php');
include('functions/data.php');
include('functions/sandbox.php');

$debug = data_settings_value($dbc, "console-status");

$path = get_path();

$page = data_page($dbc, $path['call_parts'][0]);


?>
