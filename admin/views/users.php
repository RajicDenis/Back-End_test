<?php
if(isset($opened['id'])) { ?>
	<script>	
		$(document).ready(function() {
			
			myDropzone = new Dropzone("#avatar-dropzone", { url: "upload.php?id=<?php echo $opened['id']; ?>" });
				
			myDropzone.on("success", function(file) {
				
				$("#avatar").load("ajax/avatar.php?id=<?php echo $opened['id']; ?>");
				
			});
					
		});	
	</script>
<?php } ?>

<h1>User Manager</h1>

<div class="row">
		<div class="col-md-3">
				
				<div class="list-group">
				
					<a class="list-group-item" href="index.php?page=users">
						<i class="fa fa-plus"></i>  Add new user
					</a>
				
				<?php
				
					$query = "SELECT * FROM users ORDER BY last ASC";
					$result = mysqli_query($dbc, $query);
					
					while($list = mysqli_fetch_assoc($result)) {
						
						//$bodycut = substr(strip_tags($page_list['body']), 0, 120);
						$list = data_user($dbc, $list['id']);
						
						?>
						
						<a class="list-group-item <?php selected($list['id'], $opened['id'], 'active') ?>" href="index.php?page=users&id=<?php echo $list['id']; ?>">
							<h4 class="list-group-item-heading"><?php echo $list['fullname_reverse']; ?></h4>
							<!--<p class="list-group-item-body"><?php //echo $bodycut; ?></p>-->
						</a>
						
						<?php } ?>
				
				
			</div>
		</div>
		
		<?php if(isset($message)) {echo $message; } ?>
		
		<div class="col-md-9">
		
		<?php if($opened['avatar'] != '') { ?>
			<div id="avatar">	
				<div class="avatar-container" style="background-image: url('../uploads/<?php echo $opened['avatar']; ?>')"></div>						
			</div>
		<?php } ?>
		
			<form action="index.php?page=users&id=<?php echo $opened['id']; ?>" method="post" role="form">
				
				<div class="form-group">
					<label for="first">First Name:</label>
					<input class="form-control" type="text" name="first" id="first" value="<?php echo $opened['first']; ?>" placeholder="First Name" autocomplete="off>
				</div>
				
				<div class="form-group">
					<label for="last">Last Name:</label>
					<input class="form-control" type="text" name="last" id="last" value="<?php echo $opened['last']; ?>" placeholder="Last Name" autocomplete="off>
				</div>
				
				<div class="form-group">
					<label for="user">User:</label>
					<select class="form-control" name="user" id="user">
						
						<option value="0" >Inactive</option>
						<option value="1" <?php selected($opened['email'], $_SESSION['username'], 'selected') ?>>Active</option>
												
						
					</select>
				</div>
				
				<div class="form-group">
					<label for="email">Email:</label>
					<input class="form-control" type="email" name="email" id="email" value="<?php echo $opened['email']; ?>" placeholder="E-mail" autocomplete="off>
				</div>
				
				<div class="form-group">
					<label for="password">Password:</label>
					<input class="form-control" type="password" name="password" id="password" placeholder="Password">
				</div>
				
				<div class="form-group">
					<label for="verify">Verify Password:</label>
					<input class="form-control" type="password" name="verify" id="verify" placeholder="Verify Password">
				</div>
				
				<?php if(isset($verify_error)) {echo $verify_error; } ?>	
				
				<button type="submit" class="btn btn-default">Save</button>
				<input type="hidden" name="submitted" value="1">
				<input type="hidden" name="pid" value="<?php echo $opened['id']; ?>"
				
			</form>
			
			<?php if(isset($opened['id'])) { ?>
				<div class="dropzone" id="avatar-dropzone">
					
					<input type="file" name="file" />
					
				</div>
			<?php } ?>
			
		</div>
	</div>