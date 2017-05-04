<?php
session_start();
$username = $_SESSION['username'];

$id = intval($_GET['id']);



$link = mysqli_connect("latcs7.cs.latrobe.edu.au","18162111", "iloveyou","18162111");
mysql_select_db("18162111");
$result = mysqli_query($link,"DELETE FROM Imagedata WHERE id='$id'");
$result1 = mysqli_query($link,"DELETE FROM wishlist WHERE product_id='$id'");

if($result1){

         header("Location: http://localhost/administer.php");

}
else{

         header("Location: http://localhost/administer.php");
}


?>