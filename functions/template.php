<?php

function nav_main($dbc, $path) { 
	
	$query = "SELECT * FROM navigation ORDER BY position";
	$result = mysqli_query($dbc, $query);
				
	while($nav = mysqli_fetch_assoc($result)) { 
		$nav['slug'] = get_slug($dbc, $nav['url']);
		?>
						
		<li<?php selected($path['call_parts'][0], $nav['slug'], ' class="active"') ?>><a href="<?php echo $nav['url']; ?>"><?php echo $nav['label']; ?></a></li>
						
	<?php }
	
}
?>
