<?php
session_start();
$username = $_SESSION['username'];

$color = $_GET['color'];



$link = mysqli_connect("latcs7.cs.latrobe.edu.au","18162111", "iloveyou","18162111");
$result = mysqli_query($link,"Update color set sitecolor='$color' where id=1");


if($result){

         header("Location: administer.php");

}
else{

         header("Location: administer.php");
}


?>