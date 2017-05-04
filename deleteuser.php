<?php
session_start();
$username = $_SESSION['username'];

$id = intval($_GET['id']);



$link = mysqli_connect("latcs7.cs.latrobe.edu.au","18162111", "iloveyou","18162111");

$result = mysqli_query($link,"DELETE FROM Login WHERE id='$id'");// delete user from database
$result1 = mysqli_query($link,"DELETE FROM Login WHERE username='$username'");
$result2 = mysqli_query($link,"DELETE FROM Login WHERE userame='$username'");
$result3 = mysqli_query($link,"DELETE FROM Login WHERE to_id='$id'");
$result4 = mysqli_query($link,"DELETE FROM Login WHERE from_id='$id'");

if($result4){

         header("Location: http://localhost/administer.php");

}
else{

         header("Location: http://localhost/administer.php");
}


?>