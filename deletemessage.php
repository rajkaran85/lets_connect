<?php
session_start();
$username = $_SESSION['username'];

$id = intval($_GET['id']);



$link = mysqli_connect("latcs7.cs.latrobe.edu.au","18162111", "iloveyou","18162111");

$result = mysqli_query($link,"DELETE FROM messages WHERE id='$id'");

if($result){

         header("Location: afterLogin.php");

}
else{

         header("Location: afterLogin.php");
}


?>