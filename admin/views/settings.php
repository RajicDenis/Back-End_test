<h1>Site Settings</h1>

<?php if($message) {echo $message;} ?>
<?php echo $_POST[openedid]; ?>
<div class="row">
	<div class="col-md-12">
		<?php 
			$query = "SELECT * FROM settings ORDER BY id ASC";
			$result = mysqli_query($dbc, $query);
			
			while($opened = mysqli_fetch_assoc($result)) { ?>
				
				<form class="form-inline" action="index.php?page=settings&id=<?php echo $opened['id']; ?>" method="post" role="form">
				
					<div class="form-group">
						<label class="sr-only" for="sid">ID:</label>
						<input class="form-control" type="text" name="sid" id="sid" value="<?php echo $opened['id']; ?>" >					
					</div>	
										
					<div class="form-group">		
						<label class="sr-only" for="label">Label:</label>
						<input class="form-control" type="text" name="label" id="label" value="<?php echo $opened['label']; ?>">
					</div>
							
					<div class="form-group">	
						<label class="sr-only" for="value">Value:</label>
						<input class="form-control" type="text" name="value" id="value" value="<?php echo $opened['value']; ?>">
					</div>			
					
					<button class="btn btn-default" type="submit">Save</button>
					<input type="hidden" name="submitted" value="1">
					<input type="hidden" name="openedid" value="<?php $opened['id']; ?>">
			
				</form>
			<?php } ?>
			
	</div>	
</div>
	
	
			