<?php
session_start();
$username = $_SESSION['username'];
$userid = $_SESSION['id'];
$link = mysqli_connect("latcs7.cs.latrobe.edu.au","18162111", "iloveyou","18162111");
               
$id = intval($_GET['id']);
mysqli_query($link,"insert into wishlist(username,product_id,id) values('$username','$id','$userid')");
 header('Location: afterLogin.php');

?>