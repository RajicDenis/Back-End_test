<?php

function nav_main($dbc, $pid) { 
	
	$query = "SELECT * FROM pages";
	$result = mysqli_query($dbc, $query);
				
	while($nav = mysqli_fetch_assoc($result)) { ?>
						
		<li<?php if($pid==$nav['id']) {echo ' class="active"';} ?>><a href="?page=<?php echo $nav['id']; ?>"><?php echo $nav['label']; ?></a></li>
						
	<?php }
	
}
?>
