<h1>Site Settings</h1>

<?php if($message) {echo $message;} ?>

<div class="row">
	
	<div class="col-md-4">
		<ul id="sort-nav" class="list-group">
			
			<?php
				$query = "SELECT * FROM navigation ORDER BY position ASC";
				$result = mysqli_query($dbc, $query);
				
				while($list = mysqli_fetch_assoc($result)) { ?>				
							
					<li id="list_<?php echo $list['id']; ?>" class="list-group-item"><?php echo $list['label']; ?>
						<button type="button" class="btn btn-danger btn-xs pull-right" data-toggle="collapse" data-target="#form_<?php echo $list['id']; ?>"><i class="fa fa-chevron-down"></i></button>
						
						<div id="form_<?php echo $list['id']; ?>" class="collapse">
							<form class="form-horizontal nav-form" action="index.php?page=navigation&id=<?php echo $list['id']; ?>" method="post" role="form">
				
								<div class="form-group">
									<label class="col-sm-2" for="id">Id:</label>
									<div class="col-md-10">
										<input class="form-control" type="text" name="id" id="id" value="<?php echo $list['id']; ?>" >					
									</div>
								</div>	
													
								<div class="form-group">		
									<label class="col-sm-2" for="label">Label:</label>
									<div class="col-md-10">
										<input class="form-control" type="text" name="label" id="label" value="<?php echo $list['label']; ?>">
									</div>	
								</div>
										
								<div class="form-group">	
									<label class="col-sm-2" for="url">Url:</label>
									<div class="col-md-10">
										<input class="form-control" type="text" name="url" id="value" value="<?php echo $list['url']; ?>">
									</div>	
								</div>
								
								<div class="form-group">	
									<label class="col-sm-2" for="status">Status:</label>
									<div class="col-md-10">
										<input class="form-control" type="text" name="status" id="status" value="<?php echo $list['status']; ?>">
									</div>	
								</div>				
								
								<button class="btn btn-default" type="submit">Save</button>
								<input type="hidden" name="submitted" value="1">
								<input type="hidden" name="openedid" value="<?php $list['id']; ?>">
						
							</form>
							
						</div>
					</li>
			<?php } ?>
		</ul>
	</div>
	
	<div class="col-md-8">
		
			
	</div>	
</div>
	
	
			