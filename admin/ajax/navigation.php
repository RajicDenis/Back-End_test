<?php

include("../config/connection.php");

$label = mysqli_real_escape_string($dbc, $_POST['label']);
$url = mysqli_real_escape_string($dbc, $_POST['url']);

$query = "UPDATE navigation SET label = '$label', url = '$url', status = '$_POST[status]' WHERE id = '$_POST[openedid]'";
$result = mysqli_query($dbc, $query);


?>