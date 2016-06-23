<h1>Page Manager</h1>
			
	<div class="row">
		<div class="col-md-3">
				
				<div class="list-group">
				
					<a class="list-group-item" href="index.php?page=pages">
						<i class="fa fa-plus"></i>  Add new page
					</a>
				
				<?php
				
					$query = "SELECT * FROM pages ORDER BY title ASC";
					$result = mysqli_query($dbc, $query);
					
					while($page_list = mysqli_fetch_assoc($result)) {
						
						$bodycut = substr(strip_tags($page_list['body']), 0, 120);
						
						?>
						
						<div id="page_<?php echo $page_list['id']; ?>" class="list-group-item <?php selected($page_list['id'], $opened['id'], 'active') ?>"
							<h4 class="list-group-item-heading"><?php echo $page_list['title']; ?>
								<span class="pull-right">
									<a href="#" id="del_<?php echo $page_list['id']; ?>" class="btn btn-danger btn-delete"><i class="fa fa-trash-o"></i></a>
									<a href="index.php?page=pages&id=<?php echo $page_list['id']; ?>" id="edit_<?php echo $page_list['id']; ?>" class="btn btn-danger btn-edit"><i class="fa fa-chevron-right"></i></a>
								</span>
							</h4>
							<p class="list-group-item-body"><?php echo $bodycut; ?></p>
						</div>
						
						<?php } ?>
				
				
			</div>
		</div>
		
		<?php if(isset($message)) {echo $message; } ?>
		
		
		<div class="col-md-9">
			<form action="index.php?page=pages&id=<?php echo $opened['id']; ?>" method="post" role="form">
				
				<div class="form-group">
					<label for="title">Title:</label>
					<input class="form-control" type="text" name="title" id="title" value="<?php echo $opened['title']; ?>" placeholder="Page Title">
				</div>
				
				<div class="form-group">
					<label for="user">User:</label>
					<select class="form-control" name="user" id="user">
						
						<option value="0">No user</option>
						
						<?php
							$query = "SELECT id FROM users ORDER BY first ASC";
							$result = mysqli_query($dbc, $query);
							
							while($user_id = mysqli_fetch_assoc($result)) {
								$user_data = data_user($dbc, $user_id['id']); ?>
								
								<option value="<?php echo $user_data['id']; ?>" 
									<?php 
										if(isset($_GET['id'])) {
											selected($user_data['id'], $opened['user'], 'selected');
										} else {
											selected($user_data['id'], $user['id'], 'selected');
										}
										 
									?>><?php echo $user_data['fullname']; ?></option>
							<?php } ?>
						
					</select>
				</div>
				
				<div class="form-group">
					<label for="slug">Slug:</label>
					<input class="form-control" type="text" name="slug" id="slug" value="<?php echo $opened['slug']; ?>" placeholder="Page Slug">
				</div>
				
				<div class="form-group">
					<label for="label">Label:</label>
					<input class="form-control" type="text" name="label" id="label" value="<?php echo $opened['label']; ?>" placeholder="Page Label">
				</div>
				
				<div class="form-group">
					<label for="header">Header:</label>
					<input class="form-control" type="text" name="header" id="header" value="<?php echo $opened['header']; ?>" placeholder="Page Header">
				</div>

				<div class="form-group">
					<label for="body">Body:</label>
					<textarea class="form-control editor" type="text" name="body" id="body" rows="8" placeholder="Page Body"><?php echo $opened['body']; ?></textarea>
				</div>
				
				<button type="submit" class="btn btn-default">Save</button>
				<input type="hidden" name="submitted" value="1">
				<input type="hidden" name="pid" value="<?php echo $opened['id']; ?>"
			</form>
		</div>
	</div>