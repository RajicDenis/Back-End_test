<?php

function data_settings_value($dbc, $pid) {
	
	$query = "SELECT * FROM settings WHERE id='$pid'";
	$result = mysqli_query($dbc, $query);
	
	$data = mysqli_fetch_assoc($result);
	
	return $data['value'];
	
}

function data_page($dbc, $pid) {
	if(is_numeric($pid)) {
		$cond = "WHERE id = $pid";
	} else {
		$cond = "WHERE slug = '$pid'";
	}
	
	$query = "SELECT * FROM pages $cond";
	$result = mysqli_query($dbc, $query);

	$data = mysqli_fetch_assoc($result);
	
	return $data;
	
}

?>