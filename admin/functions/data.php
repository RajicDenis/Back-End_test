<?php

function data_settings_value($dbc, $pid) {
	
	$query = "SELECT * FROM settings WHERE id='$pid'";
	$result = mysqli_query($dbc, $query);
	
	$data = mysqli_fetch_assoc($result);
	
	return $data['value'];
	
}

function data_user($dbc, $id) {
	if(is_numeric($id)) {
		$cond = "WHERE id = '$id'";
	} else {
		$cond = "WHERE email = '$id'";
	}
	
	$query = "SELECT * FROM users $cond";
	$result = mysqli_query($dbc, $query);
	
	$data = mysqli_fetch_assoc($result);
	$data['fullname'] = $data['first'].', '.$data['last'];
	$data['fullname_reverse'] = $data['last'].', '.$data['first'];
	return $data;
	
	
}

function data_page($dbc, $pid) {
	
	$query = "SELECT * FROM pages WHERE id=$pid";
	$result = mysqli_query($dbc, $query);

	$data = mysqli_fetch_assoc($result);
	
	return $data;
	
}

?>