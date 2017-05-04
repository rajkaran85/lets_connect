<?php
session_start();
$username = $_SESSION['username'];
$userid = $_SESSION['id'];

$description = $_POST['description'];




$link = mysqli_connect("latcs7.cs.latrobe.edu.au","18162111", "iloveyou","18162111");

$result = mysqli_query($link,"insert into itemrequests(requested_by,description) values('$userid','$description')");

if($result){
$_SESSION['requestsent'] = true;
         header("Location: afterLogin.php");

}
else{
$_SESSION['requestsent'] = false;
         header("Location: afterLogin.php");
}


?>