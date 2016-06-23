<?php

include('../config/connection.php');

session_start();

if($_POST) {
	
	$query = "SELECT * FROM users WHERE email = '$_POST[email]' AND password = SHA1('$_POST[password]')";
	$result = mysqli_query($dbc, $query);
	
	if(mysqli_num_rows($result) == 1) {
		
		$_SESSION['username'] = $_POST['email'];
		header('Location: index.php');
		
	}
	
}

?>


<!DOCTYPE html>
<html>
	<head>
		<title>Login Page</title>
		<meta name="viewport" content="width=width-device, initial-scale=1">  
		
		<?php include('config/css.php'); ?>
		<?php include('config/js.php'); ?>	
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<div id="panel" class="panel panel-primary">
						<div class="panel-heading"><h3>Login</h3></div>
						<div class="panel-body">
								  <form action="login.php" method="post" role="form">
									<div class="form-group">
									    <label for="email">Email address</label>
									    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
									  </div>
									  
									  <div class="form-group">
									    <label for="password">Password</label>
									    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
									  </div>
									  
									  <!--<div class="checkbox">
									    <label>
									      <input type="checkbox"> Check me out
									    </label>
									  </div> -->
									  <button type="submit" class="btn btn-default">Submit</button>
									</form>
						
							</div> <!-- END panel body -->
							
					 </div><!-- END panel -->
			
				  </div> <!-- END column -->
			 </div><!-- END row -->
	   </div><!-- END container
		
	</body>	
</html>