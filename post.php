<?php
if(isset($comment))
{
echo $comment;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Title</title>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
    <script src="first.js"></script>
    <link rel="stylesheet" type="text/css" href="first.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.js"></script>
<body class="container">
<div class="postItem">
<h1><?php
    if(isset($comment))
    {
    echo $comment;
    }
    ?></h1>

<h3>
    Post Ad
</h3>
<h3> Select Category</h3>





<form action="post.php" method="POST" enctype="multipart/form-data"><br>

    <select name="selected">
    <option  value="Clothing">Clothing</option>
    <option  value="Toys">Toys</option>
    <option  value="Kitchen">Kitchen</option>
    <option  value="Electronics">Electronics</option>
    <option  value="Sports">Sports</option>
    <option  value="Miscellaneous Goods">Miscellaneous Goods</option>
    </select><br>
    <h3>Select image to post</h3>
    <br>
    <label class="control-label">Select File</label>

    <br>

    <input type="file" name="image" size="60"/>
    <input type="hidden" id="lat" name="lat" value="null" />
    <input type="hidden" id="lon" name="lon" value="null"/>



    <br>
    <textarea rows="4" cols="50" name="description" placeholder="Enter description here ..."></textarea>
<br>
<input type="submit" value="Submit" name="submit">
&nbsp;&nbsp;&nbsp;
<input type="button" value="Get my location" onclick="getLocation()"/>
&nbsp;&nbsp;&nbsp;
<div id="locationOutput"></div>

</form>
<br>

<?php
if(isset($_POST['submit']))
{
	$link = mysqli_connect("latcs7.cs.latrobe.edu.au","18162111", "iloveyou","18162111");
	//mysql_select_db("18162111");

session_start();
$username = $_SESSION['username'];
$imageName = mysqli_real_escape_string($link,$_FILES["image"]["name"]);
$description = $_POST['description'];
$Category = $_POST['selected'];
$lat =  $_POST['lat'];
$lon =  $_POST['lon'];
//print_r($_FILES["image"]);
$imageData = mysqli_real_escape_string($link,file_get_contents($_FILES["image"]["tmp_name"]));
//echo $imageData;
$imageType = mysqli_real_escape_string($link,$_FILES["image"]["type"]);
$t=time();

if(substr($imageType,0,5)=="image")
{
//echo "working code";
mysqli_query($link,"insert into Imagedata(username,category,image,description,created,lat,lon) values('$username','$Category', '$imageData', '$description','$t','$lat','$lon')");
//static $comment= "image uploaded successfully";
echo "Image Uploaded";
unset($Category);
unset($imageData);
unset($description);
header("Location: afterLogin.php");



}
else
{
echo "only images are allowed";
}
mysqli_close($link);
unset($Category);
unset($imageData);
unset($description);
unset($username);

}

?>
</div>
<script>

 var x = document.getElementById("locationOutput");
  var lat = document.getElementById("lat");
   var lon = document.getElementById("lon");
 function getLocation() {
     if (navigator.geolocation) {
         navigator.geolocation.getCurrentPosition(showPosition);
     } else {
         x.innerHTML = "Geolocation is not supported by this browser.";
     }
 }
 function showPosition(position) {
//    x.innerHTML = "Latitude: " + position.coords.latitude +
//     "<br>Longitude: " + position.coords.longitude;
     lat.value = position.coords.latitude;
     lon.value = position.coords.longitude;
    x.innerHTML = '<span class="glyphicon glyphicon-ok"></span> Location Selected';

 }



</script>
</body>
</html>