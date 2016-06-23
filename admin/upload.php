<?php

include('/config/connection.php');

$ds = DIRECTORY_SEPARATOR;

$storeFolder = '../uploads';   //2

$ext = PATHINFO($_FILES['file']['name'], PATHINFO_EXTENSION);
$newname = time();
$random = rand(100,999);
$name = $newname.$random.'.'.$ext;

$query = "SELECT avatar FROM users WHERE id = $_GET[id]";
$result = mysqli_query($dbc, $query);
$old = mysqli_fetch_assoc($result);
 
$query = "UPDATE users SET avatar = '$name' WHERE id = $_GET[id]";
$result = mysqli_query($dbc, $query);
 
if (!empty($_FILES)) {
     
    $tempFile = $_FILES['file']['tmp_name'];          //3             
      
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4
     
    $targetFile =  $targetPath. $name;  //5
 
    move_uploaded_file($tempFile,$targetFile); //6
    
    $deleteFile = $targetPath.$old['avatar'];
	
	if($old['avatar'] != '') {
		if(!is_dir($delete_file)) {
			unlink($deleteFile);
		}	
	}
	
     
}

?>