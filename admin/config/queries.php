<?php
	
	switch ($page) {
		case 'users':
			if(isset($_POST['submitted']) == 1) {
		
				$first = mysqli_real_escape_string($dbc, $_POST['first']);
				$last = mysqli_real_escape_string($dbc, $_POST['last']);
				
				if($_GET['id'] != '') {
					if($_POST['verify'] == $_POST['password'] AND $_POST['password'] != '') {
						$verify = true;
						$action = 'updated!'; 
						$query = "UPDATE users SET first = '$first', last = '$last', email = '$_POST[email]', password = SHA1('$_POST[password]') WHERE id = $_GET[id]";						
					} else {
						$verify = false;
						$verify_error = '<p class="alert alert-danger">Passwords fields empty and/or do not match!</p>';					
					}
					
					
				} else {
					if($_POST['verify'] == $_POST['password']) {
						$verify = true;
						$action = 'Added!'; 
						$query = "INSERT INTO users (first, last, email, password) VALUES ('$first', '$last', '$_POST[email]', SHA1('$_POST[password]'))";
					} else {
						$verify = false;
						$verify_error = '<p class="alert alert-danger">Passwords do not match!</p>';
					}
					
				}
				
				$result = mysqli_query($dbc, $query);
				
				if($result) {
					if($verify == true) {
						$message = '<p class="alert alert-success">User was '.$action.'</p>';
					}
				} else {
					if($verify == true) {
						$message = '<p class="alert alert-danger">User could not be '.$action.'</p>'.mysqli_error($dbc);
						$message .='<p class="alert alert-danger">'.$query.'</p>';
					}		
				}
			}
			break;
		
		case 'settings':
			if(isset($_POST['submitted']) == 1) {
				$value = mysqli_real_escape_string($dbc, $_POST['value']);
				$label = mysqli_real_escape_string($dbc, $_POST['label']);		
				 
				$query = "UPDATE settings SET label = '$label', value = '$value' WHERE id = $_POST[sid]";
				$result = mysqli_query($dbc, $query);
				

				if($result) {
					$message = '<p class="alert alert-success">Status updated!</p>';
				} else {
					$message = '<p class="alert alert-danger">Status could not be changed: '.mysqli_error($dbc).'</p>';
					$message .= '<p class="alert alert-danger">'.$query.'</p>';
				}
			}
			
			break;
	
		case 'pages':
			if(isset($_POST['submitted']) == 1) {
		
				$title = mysqli_real_escape_string($dbc, $_POST['title']);
				$label = mysqli_real_escape_string($dbc, $_POST['label']);
				$header = mysqli_real_escape_string($dbc, $_POST['header']);
				$body = mysqli_real_escape_string($dbc, $_POST['body']);
				
				if($_GET['id'] != '') {
					$action = 'updated!';
					$query = "UPDATE pages SET user = $_POST[user], slug = '$_POST[slug]', title = '$title', label = '$label', header = '$header', body = '$body' WHERE id = $_GET[id]";
					
				} else {
					$action = 'added!';
					$query = "INSERT INTO pages (user, slug, title, label, header, body) VALUES ('$_POST[user]', '$_POST[slug]', '$title', '$label', '$header', '$body')";
				}
				
				$result = mysqli_query($dbc, $query);
				
				if($result) {
					$message = '<p class="alert alert-success">Page was '.$action.'</p>';
				} else {
					$message = '<p class="alert alert-danger">Page could not be '.$action.'</p>'.mysqli_error($dbc);
					$message .='<p class="alert alert-danger">'.$query.'</p>';
				}
			}
			break;
			
		case 'navigation':
			if(isset($_POST['submitted']) == 1) {
		
				$label = mysqli_real_escape_string($dbc, $_POST['label']);
				
				if($_GET['id'] != '') {
					$action = 'Updated';
					$query = "UPDATE navigation SET id = '$_POST[id]', label = '$label', url = '$_POST[url]', position = '$_POST[position]', status = '$_POST[status]' WHERE id = $_GET[id]";
					
				} else {
					$action = 'Added';
					$query = "INSERT INTO navigation (id, label, url, position, status) VALUES ('$_POST[id]', '$label', '$_POST[url]', '$_POST[position]', '$_POST[status]')";
				}
				
				$result = mysqli_query($dbc, $query);
				
				if($result) {
					$message = '<p class="alert alert-success">'.$action.' successfully!</p>';
				} else {
					$message = '<p class="alert alert-danger">Error: Could not be '.$action.'</p>'.mysqli_error($dbc);
					$message .='<p class="alert alert-danger">'.$query.'</p>';
				}
			}
			break;
	}
	
						
	
						
?>