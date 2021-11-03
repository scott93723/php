<?php
error_reporting(0);

$msg = "";

// If upload button is clicked ...
if (isset($_POST['upload'])) {

	$filename = $_FILES["uploadfile"]["name"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];	
	$folder = "image/".$filename;
		
	$db = mysqli_connect("localhost", "root", "12345678", "student_data");

		// Get all the submitted data from the form
		$imgData = addslashes(file_get_contents($_FILES['uploadfile']['tmp_name']));
		
		$sql = "INSERT INTO members (account, password, picture) VALUES ('$filename','88888888','$imgData');";
		echo $sql;
		echo "<br>";
		// Execute query
		$xxx = mysqli_query($db, $sql);
		echo $xxx;
		echo "<br>";
		// Now let's move the uploaded image into the folder: image
		if (move_uploaded_file($tempname, $folder)) {
			$msg = "Image uploaded successfully";
		}else{
			$msg = "Failed to upload image";
	}
}
echo $msg;
?>
