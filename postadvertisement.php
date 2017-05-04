<?php
session_start();
$link = mysqli_connect("latcs7.cs.latrobe.edu.au","18162111", "iloveyou","18162111");



$username = $_SESSION['username'];
$imageName = mysqli_real_escape_string($link,$_FILES["ad_image"]["name"]);

$description = $_POST['ad_information'];
//echo $description;

$imageData = mysqli_real_escape_string($link,file_get_contents($_FILES["ad_image"]["tmp_name"]));

$imageType = mysqli_real_escape_string($link,$_FILES["ad_image"]["type"]);
$t=time();

if(substr($imageType,0,5)=="image")
{
//echo "working code";
mysqli_query($link,"insert into advertisements(description,image) values('$description','$imageData'");

//header("Location: administer.php");



}
else
{
echo "only images are allowed";
}




?>