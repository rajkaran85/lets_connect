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

    <style>
        .carousel-inner > .item > img,
        .carousel-inner > .item > a > img {
            width: 70%;
            margin: auto;
        }
    </style>


</head>



<body id="main" class="ody">
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

                </style>
<?php
 $link = mysqli_connect("latcs7.cs.latrobe.edu.au","18162111", "iloveyou","18162111");
              //  mysql_select_db("18162111");
                  $result = mysqli_query($link,"SELECT * FROM Imagedata  ORDER BY id DESC");
                   $resultCarousel = mysqli_query($link,"SELECT * FROM  Imagedata  ORDER BY id DESC LIMIT 4");
                   // print_r($resultCarousel);

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
                <a class="navbar-brand" href="first.html"> <img src="letconnect.jpg" width="100" height="60"></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="first.html">Home</a></li>
                    <li><a href="AboutUs.html">About Us</a></li>
                    <li><a href="contactUs.html">Contact Us</a></li>
                   
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a onclick="loadLoginPage()"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    <li><a  onclick="loadLoginPage()"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
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


    <div class="changingPics"><br>

        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                          <?php
                          $resultCarouselImage = mysqli_query($link,"SELECT * FROM  Imagedata  ORDER BY id DESC LIMIT 4");

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


    <div class="pics">
       <table>
                   <tr>
                   <!--
                       <td style="text-align: center" class="container">

                           <img src="table.jpg" class="img-rounded" alt="Cinque Terre" width="304" height="236">

                           <h3 style="position: relative">This is first pic</h3>


                       </td>
                       <td style="text-align: center" class="container">
                           <img src="table.jpg" class="img-rounded" alt="Cinque Terre" width="304" height="236">
                           <h3>this is sec</h3>
                       </td>
                       <td style="text-align: center" class="container">
                           <img src="table.jpg" class="img-rounded" alt="Cinque Terre" width="304" height="236">
                       </td>
                       <td style="text-align: center" class="container">
                           <img src="table.jpg" class="img-rounded" alt="Cinque Terre" width="304" height="236">
                       </td>
                   </tr>
                   <tr>
                       <td style="text-align: center" class="container">
                           <img src="table.jpg" class="img-rounded" alt="Cinque Terre" width="304" height="236">
                       </td>
                       <td style="text-align: center" class="container">
                           <img src="table.jpg" class="img-rounded" alt="Cinque Terre" width="304" height="236">
                       </td>
                       <td style="text-align: center" class="container">
                           <img src="table.jpg" class="img-rounded" alt="Cinque Terre" width="304" height="236">
                       </td>
                       <td style="text-align: center" class="container">
                           <img src="table.jpg" class="img-rounded" alt="Cinque Terre" width="304" height="236">
                       </td>
                       -->
                       <!-- Get Images from database and display here -->

                       <?php
                       $n= 0;



                       while($row = mysqli_fetch_assoc($result)) {
                       if($n==0){echo '<tr>';}


                           echo '<td style="text-align: center" class="container">';


                               echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image']).'" width="304" height="236"/>';
                               echo '<h3 style="position: relative;text-align:center;">'.$row['description'].'</h3>';


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



    </div>
</body>
</html>
