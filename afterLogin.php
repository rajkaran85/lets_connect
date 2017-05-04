  <?php
                 session_start();
                 $username = $_SESSION['username'];
                 if(!isset($username))
                 {
                 header('Location: http://webprog.cs.latrobe.edu.au/~18162111/assign2/');
                 };
				 $link = mysqli_connect("latcs7.cs.latrobe.edu.au","18162111", "iloveyou","18162111");
 $resultC = mysqli_query($link,"SELECT * FROM color where id=1");
 $c = mysqli_fetch_assoc($resultC);

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>

        <link rel="stylesheet" type="text/css" href="first.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.js"></script>
        <script src="first.js"></script>

    <style>
        .carousel-inner > .item > img,
        .carousel-inner > .item > a > img {
            width: 70%;
            margin: auto;
        }
    </style>


</head>

<?php



echo '<body style="background-color:'.$c['sitecolor'].'!important;position:absolute">';

?>
<div  class="container">

 <nav class="navbar navbar-inverse navbar-fixed-top">
         <div class="container-fluid">
             <div class="navbar-header">
                 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                 </button>
                 <a class="navbar-brand" href="afterLogin.php"> <img src="letconnect.jpg" width="100" height="60"></a>
             </div>
             <div class="collapse navbar-collapse" id="myNavbar">
                 <ul class="nav navbar-nav">
                     <li class="active"><a href="first.html">Home</a></li>
                     <li><a href="AboutUs.html">About Us</a></li>
                     <li><a href="contactUs.html">Contact Us</a></li>

                 </ul>
                 <ul class="nav navbar-nav navbar-right">
                 <?php


                 $username = $_SESSION['username'];
                 $id = $_SESSION['id'];


                 ?>
                 <?php

                   
                               //   mysql_select_db("18162111");
                                    $result = mysqli_query($link,"SELECT name FROM Login WHERE id = '$id'");
                                    $name = mysqli_fetch_assoc($result);
                                    $firstname = $name['name'];
                                     $resultAll = mysqli_query($link,"SELECT * FROM Imagedata  ORDER BY id DESC");


                 ?>
                     <li><a onclick="loadSignPage()"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $firstname ; ?> </a></li>
                     <li><a onclick="post()"><span class="glyphicon glyphicon-log-in"></span> Post ad</a></li>
                     <li><a  href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                 </ul>
             </div>
         </div>

     </nav>

    <div class="row" style="margin-top: 10%; margin-left: 50%">
        <div class="col-sm-6">
            <div class="dropdown">
                <button class="btn btn-success dropdown-toggle" type="button" id="menu1" data-toggle="dropdown" style="width: 100%">Categories
                    <span class="caret"></span></button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Clothing</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Electronics</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Motors</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Toys</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Home & Garden</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Sporting Goods</a></li>
                    <li role="presentation" class="divider"></li>

                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">About Us</a></li>
                </ul>
            </div>
        </div>


        <div class="col-sm-6">
            <p><input type="text" id = "searchText" style="width: 130px">
                <button type="button" class="btn btn-success">
                    <span class="glyphicon glyphicon-search"></span> Search
                </button>
            </p>
        </div>
    </div>
    <div class="container">
    <div class="requesting">
        <h3><a href="#request" type="button" class="btn btn-info">Request an Item</a>
</h3>
        </div>
        </div>
<?php
 $link = mysqli_connect("latcs7.cs.latrobe.edu.au","18162111", "iloveyou","18162111");
             //   mysql_select_db("18162111");
                  $result = mysqli_query($link,"SELECT * FROM Imagedata where username='$username' ORDER BY id DESC");
                   $resultCarousel = mysqli_query($link,"SELECT * FROM  Imagedata WHERE username='$username' ORDER BY id DESC LIMIT 4");


?>
 <style type="text/css">
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
                .glyphicon-heart{
                color:red!important;
                }

                </style>
    <div class="changingPics"><br>

        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <?php
                $resultCarouselImage = mysqli_query($link,"SELECT * FROM  Imagedata WHERE username='$username' ORDER BY id DESC LIMIT 4");

                $c=0;
                while($row = mysqli_fetch_assoc($resultCarouselImage)){

                if($c==0){
                echo '<li data-target="#myCarousel"  data-slide-to="'.$c.'" class="active"></li>';
                }else{
                    echo '<li data-target="#myCarousel" data-slide-to="'.$c.'"></li>';
                }
                $c++;
                }
                ?>

            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <?php
                $j=0;
                 while($rowC = mysqli_fetch_assoc($resultCarousel)) {

                 if($j==0){
                 echo '<div class="item active">';
                 echo '<img src="data:image/jpeg;base64,'.base64_encode($rowC['image']).'" width="460" height="345"/>';
                 echo '</div>';
                 }
                 else{
                 echo '<div class="item ">';
                  echo '<img src="data:image/jpeg;base64,'.base64_encode($rowC['image']).'" width="460" height="345"/>';
                echo '</div>';
                    }
                $j++;
                }
                ?>

            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
<!------------------------ GOOGLE MAPS SPACE---------------------------- -->
<script src="http://maps.googleapis.com/maps/api/js"></script>
<script>
//function initialize() {
//
//
//
//
//<?php
//
// $resultAllLoc = mysqli_query($link,"SELECT description,lat,lon FROM Imagedata  ");
//
//
//
//while ($row = mysqli_fetch_assoc($resultAllLoc))
//{
//   $array_loc[] = $row;
//}
//
//
//
//$js_array = json_encode($array_loc);
//echo "var locations=".$js_array.";";
//
//?>
//
//
//
//var map;
//
//
//var lat = 0;
//var lon = 0;
//
//console.log(locations.length);
//
//for (i=0;i<locations.length;i++)
//
//{
//
//var locationObj = locations[i];
//
//
//          var myCenter=new google.maps.LatLng(locationObj.lat,locationObj.lon);
//          var mapProp = {
//            center:new google.maps.LatLng(lat,lon),
//            zoom:5,
//            mapTypeId:google.maps.MapTypeId.ROADMAP
//          };
//        var marker=new google.maps.Marker({
//          position:myCenter,
//          });
//
//          map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
//
//          marker.setMap(map);
//
//}
//
//
//}
//
//
//google.maps.event.addDomListener(window, 'load', initialize);
//
//
//
//

</script>


<!-- Displaying Multiple Markers -->
<script>
function initialize() {

<?php

 $resultAllLoc = mysqli_query($link,"SELECT description,lat,lon FROM Imagedata");



while ($row = mysqli_fetch_assoc($resultAllLoc))
{
   $array_loc[] = $row;
}



$js_array = json_encode($array_loc);
echo "var locations=".$js_array.";";

?>

// building location array with information

var locationsArray = [];
var locArr = [];
for (i=0;i<locations.length;i++){

	if( (locations[i].lat != "null" && locations[i].lon != "null")  ){
		
		locArr.push(locations[i].description);
		locArr.push(locations[i].lat);
		locArr.push(locations[i].lon);
		locationsArray.push(locArr);
		locArr = [];
	}

}

console.log(locationsArray);

    var map;
    var bounds = new google.maps.LatLngBounds();
    var mapOptions = {
        mapTypeId: 'roadmap'
    };

    // Display a map on the page
    map = new google.maps.Map(document.getElementById("googleMap"), mapOptions);
    map.setTilt(45);


    

    // Info Window Content

    // Display multiple markers on a map
    var infoWindow = new google.maps.InfoWindow(), marker, i;

    // Loop through our array of markers & place each one on the map
    for( i = 0; i < locationsArray.length; i++ ) {
        var position = new google.maps.LatLng(locationsArray[i][1], locationsArray[i][2]);
        bounds.extend(position);
        marker = new google.maps.Marker({
            position: position,
            map: map,
            title: locationsArray[i][0]
        });



        // Automatically center the map fitting all markers on the screen
        map.fitBounds(bounds);
    }

    // Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
        this.setZoom(14);
        google.maps.event.removeListener(boundsListener);
    });

}
google.maps.event.addDomListener(window, 'load', initialize);


</script>


<!-- ---------------------------- -->
<div class="pics">
 <?php
echo '<div id="googleMap" style="width:1000px;height:380px;"></div>';
?>
</div>
<!------------------------ GOOGLE MAPS SPACE END---------------------------- -->

  <div class="pics">
    <h3>All Items </h3>
        <table>
            <tr>

                <!-- Get Images from database and display here -->

                <?php
                 $resultAll = mysqli_query($link,"SELECT * FROM Imagedata  ORDER BY id DESC");

                $n= 0;



                while($row = mysqli_fetch_assoc($resultAll)) {
                $idWish = $row['id'];
                $addedRowResult = mysqli_query($link,"SELECT * FROM wishlist  where product_id='$idWish'");
                $isWish = count(mysqli_fetch_assoc($addedRowResult));

                if($n==0){echo '<tr>';}


                    echo '<td style="text-align: center" class="container">';


                        echo '<a href="viewdetail.php?id='.$row['id'].'"><img src="data:image/jpeg;base64,'.base64_encode($row['image']).'" width="304" height="236"/></a>';

                        if($isWish){
                        echo '<h3 style="position: relative;text-align:center;">'.$row['description'].'<span><span class="glyphicon glyphicon-heart"></span></span></h3>';

                        }else{
                        echo '<h3 style="position: relative;text-align:center;">'.$row['description'].'<span></span></h3>';
                        }

                     echo '</td>';
                 $n++;
                 if($n==4){
                echo '</tr>';
                $n=0;
                }


                    }
                ?>



            </tr>
        </table>
    </div>
    <div class="pics">
    <h3>My Items</h3>
        <table>
            <tr>

                <!-- Get Images from database and display here -->

                <?php
                $n= 0;



                while($row = mysqli_fetch_assoc($result)) {
                $product_id = $row['id'];
                  $resultInterested = mysqli_query($link,"SELECT  * FROM wishlist where product_id='$product_id' ");
                $numberOfInterested =mysqli_num_rows($resultInterested);

                if($n==0){echo '<tr>';}


                    echo '<td style="text-align: center" class="container">';


                        echo '<a href="viewdetail.php?id='.$row['id'].'"><img src="data:image/jpeg;base64,'.base64_encode($row['image']).'" width="304" height="236"/></a>';
                        echo '<h3 style="position: relative;text-align:center;">'.$row['description'].'</h3>';
                        echo '<div>'.$numberOfInterested.' <span class="glyphicon glyphicon-user"></span> Interested</div>';
                        //print_r(mysqli_fetch_assoc($resultInterested));

                     echo '</td>';
                 $n++;
                 if($n==4){
                echo '</tr>';
                $n=0;
                }


                    }
                ?>



            </tr>
        </table>
    </div>

  <div class="pics">
    <h3>My Wishlist</h3>
        <table>
            <tr>

                <!-- Get Images from database and display here -->

                <?php
                $n= 0;


                $resultWishlist = mysqli_query($link,"SELECT Imagedata.image,Imagedata.description,Imagedata.id FROM wishlist INNER JOIN Imagedata ON wishlist.product_id = Imagedata.id AND wishlist.username='$username'");
                while($rowW = mysqli_fetch_assoc($resultWishlist)) {


                if($n==0){echo '<tr>';}


                    echo '<td style="text-align: center" class="container">';


                        echo '<a href="viewdetail.php?id='.$rowW['id'].'"><img src="data:image/jpeg;base64,'.base64_encode($rowW['image']).'" width="304" height="236"/></a>';
                        echo '<h3 style="position: relative;text-align:center;">'.$rowW['description'].'</h3>';


                     echo '</td>';
                 $n++;
                 if($n==4){
                echo '</tr>';
                $n=0;
                }


                    }
                ?>



            </tr>
        </table>
    </div>

 <div class="pics">
    <h3>My Messages</h3>
        <table class="table table-striped">


                <!-- Get Images from database and display here -->

                <?php
                $n= 0;


                $resultMessages = mysqli_query($link,"SELECT Login.name,messages.message,messages.from_id,messages.id FROM messages INNER JOIN Login ON messages.from_id = Login.id AND messages.to_id='$id'");
                        $numberOfMessages =mysqli_num_rows($resultMessages);
                if($numberOfMessages == 0){
                 echo "<h4>You don't have any messages";
                        }

                while($rowM = mysqli_fetch_assoc($resultMessages)) {
                echo "<tr>";
                echo "<td>";
                echo $rowM['name'];
                echo "</td>";

                 echo "<td>";
                 echo $rowM['message'];
                 echo "</td>";

                 echo "<td>";
                 echo '<a href=message.php?id='.$rowM['from_id'].' />Send Message</a>';
                echo "</td>";
                echo "<td>";
                echo '<a href=deletemessage.php?id='.$rowM['id'].' />Delete Message</a>';
              echo "</td>";


                echo "</tr>";

                    }
                ?>



        </table>
    </div>

 <div class="pics">
    <h3>Items requested by people</h3>
        <table class="table table-striped">


                <!-- Get Images from database and display here -->

                <?php
                $n= 0;


                $resultItemsR = mysqli_query($link,"SELECT itemrequests.description,Login.name FROM itemrequests INNER JOIN Login ON itemrequests.requested_by = Login.id ");
                        $numberOfItemsR =mysqli_num_rows($resultItemsR);
                if($numberOfItemsR == 0){
                 echo "<h4>No One has requested any items</h4>";
                        }

                while($rowRI = mysqli_fetch_assoc($resultItemsR)) {
                echo "<tr>";
                echo "<td>";
                echo $rowRI['name'];
                echo "</td>";

                 echo "<td>";
                 echo $rowRI['description'];
                 echo "</td>";




                echo "</tr>";

                    }
                ?>



        </table>
    </div>




    <div class="pics">
  <div id="request"><h3>Cannot find an Item? Request it here</h3> </div>

  <form action="request_item.php" method="post">
  <textarea width="100%" class="form-control"  name="description" rows="7">


  </textarea><br>
  <input type="submit" value="Request now"/>



  </form>

<br><br><br>

</div>

</div>
</body>
</html>
