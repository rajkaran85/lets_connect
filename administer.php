<?php
 session_start();
//$username = $_SESSION['username'];
//$id = $_SESSION['id'];
$_SESSION['isadmin'] = true;
$_SESSION['username'] = "latrobe@gmail.com";
$id= '1';
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
    <script src="first.js"></script>
    <link rel="stylesheet" type="text/css" href="first.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.js"></script>




</head>

<style>

.adminButtons{

}
</style>
<?php
//echo $c['sitecolor'];
echo '<body style="background-color:'.$c['sitecolor'].'!important;position:absolute">';
?>

<nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="first.html"> <img src="letconnect.jpg" width="100" height="60"></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="first.html">Home</a></li>
                    <li><a href="AboutUs.html">About Us</a></li>
                    <li><a href="Contact.html">Contact Us</a></li>
                    <li><a href="Gallery.html">Gallery</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a  href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                    <li><a  onclick="loadLoginPage()"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
					
                </ul>
            </div>
                </div>

    </nav>

<table class="adminButtons" >
        <tr style="text-align: center">
            <td><button type="button" class="btn btn-primary active">Manage Advertisements</button></td>
            <td><div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Edit/Delete Posts
                    <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                    <li><a onclick="showUsers()" >Users</a></li>
                    <li><a onclick="showPosts()" >Items</a></li>
                </ul>
            </div></td>
            <td><div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Change Color
                    <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li style="background-color: green"><a onclick="setFirstColor()" href="#">Green</a></li>
                    <li style="background-color: cornflowerblue"><a onclick="setSecondColor()" href="#">Blue</a></li>
                    <li style="background-color: grey"><a onclick="setThirdColor()" href="#">Grey</a></li>
                </ul>
            </div></td>
        </tr>
</table>
<div style="margin-left:4%;">
<!-- Space for advertisements -->
<form action="postadvertisement.php" method="POST" enctype="multipart/form-data"><br>


    <h3>Select image to post</h3>
    <br>
    <label class="control-label">Select File</label>

    <br>

    <input type="file" name="ad_image" size="60"/>

    <br>
    <textarea rows="4" cols="50" name="ad_information" placeholder="Enter description here ..."></textarea>
<br>
<input type="submit" value="Submit" name="submit">



</form>
</div>





<!--  ---------------------- -->


<div id="users">
<h2>List of all active users </h2>
 <table class="table ">
        <?php



                          $result = mysqli_query($link,"SELECT * FROM Login");




                         while ( $p = mysqli_fetch_assoc($result))
                        {
                        echo "<tr>";
                        echo "<td>";
                        echo "".$p['name']. "<br>";
                        echo "</td>";
                        echo "<td>";
                            echo '<a href=deleteuser.php?id='.$p['id'].' />Delete User</a>';
                        echo "</td>";
                        echo "</tr>";
                        }


        ?>
        </table>
</div>
<!-- Display all the posts -->
<div id="posts">
  <h2>List of all Posts </h2>
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
<script>
$("#users").hide();
$("#posts").hide();

function showUsers(){
 $("#users").show();
 $("#posts").hide();
}

function showPosts(){
 $("#users").hide();
   $("#posts").show();
}

</script>
<script>
function setFirstColor(){

window.location = "setcolor.php?color=green";

}
function setSecondColor(){

window.location = "setcolor.php?color=blue";

}

function setThirdColor(){


 window.location = "setcolor.php?color=grey";

 }

</script>
</body>
</html>