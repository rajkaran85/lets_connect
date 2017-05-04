<?php

session_start();
$id = intval($_GET['id']);
 $link = mysqli_connect("latcs7.cs.latrobe.edu.au","18162111", "iloveyou","18162111");
                //mysql_select_db("18162111");
                  $result = mysqli_query($link,"SELECT * FROM Imagedata where id='$id' ORDER BY id DESC");
                  $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
 <style type="text/css">
 body{
 margin:20px;
 }
                img {
                  display: block;
                   //min-width:300px;
                    //min-height:300px;
                    max-width:300px;
                    max-height:300px;
                  width: auto;
                  height: auto;
                }
                td.container{


                height:300px!important;
                width:300px!important;
                }

                </style>
</head>
<script src="http://maps.googleapis.com/maps/api/js"></script>
<script>
function initialize() {
var lat= <?php echo $row['lat']; ?>;
var lon = <?php echo $row['lon']; ?>;
console.log(lat);console.log(lon);



  var myCenter=new google.maps.LatLng(lat,lon);
  var mapProp = {
    center:new google.maps.LatLng(lat,lon),
    zoom:15,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
var marker=new google.maps.Marker({
  position:myCenter,
  });






  var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
  marker.setMap(map);

var infowindow = new google.maps.InfoWindow({
  content: "<?php echo $row['description']; ?>"

  });

infowindow.open(map,marker);

}


google.maps.event.addDomListener(window, 'load', initialize);





</script>
<body>
<h2>Item details</h2>
<?php


date_default_timezone_set('Australia/Melbourne');
$date = date('l jS  F Y ',$row['created']);
echo $date;
echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image']).'" width="460" height="345"/><br><br>';
echo $row['description'];
echo "<br>";
echo "Posted at <b>";
echo $date;
echo "</b>";
echo"<br>Price $<b>";
echo $row['price'];
echo "</b><br>Posted By <b>";
echo $row['username'];
echo "</b><br>";


if(isset($_SESSION['isadmin'])){
echo '<br><a href="deletepost.php?id='.$id.'"><input type="submit" value="DELETE POST"/></a>';

}
else{
echo '<br><a href="addtowishlist.php?id='.$id.'"><input type="submit" value="Add to wishlist"/></a>';
echo '<h4><u>People Interested</u></h4>';
$resultInterested = mysqli_query($link,"SELECT * FROM wishlist where product_id='$id' ");
while($row = mysqli_fetch_assoc($resultInterested)) {
echo $row['username'];
echo '<a href="message.php?id='.$row['id'].'"> <span class="glyphicon glyphicon-envelope"></span></a><br>';

}

}
?>
<?php


if ($row['lat'] == null && $row['lon'] == null){
echo '<h3>Item Location</h3>';
echo '<div id="googleMap" style="width:500px;height:380px;"></div>';
}
else{
echo '<h3>User has not shared his location details</h3>';
}

?>
</body>

</html>