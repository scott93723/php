<?php
error_reporting(0);

$msg = "register_fail";

$account = $_POST["account"];
$password= $_POST["password"];

$filename = $_FILES["uploadfile"]["name"];
$tempname = $_FILES["uploadfile"]["tmp_name"];



$db = mysqli_connect("localhost", "root", "12345678", "student_data");
// Get all the submitted data from the form
$imgData = addslashes(file_get_contents($_FILES['uploadfile']['tmp_name']));		
$sql = "INSERT INTO members (account, password, power, picture) VALUES ('$account','$password','2','$imgData');";
// Execute query
$xxx = mysqli_query($db, $sql);
mysqli_close($db);
if($xxx == 1){
   $msg = "upload_ok";
}
echo $msg;
?>
