<?php
session_start();
$username = $_SESSION['username'];
$userid = $_SESSION['id'];

$message = $_POST['message'];
$to_id = $_POST['to_id'];



$from_id = $userid;

echo $to_id;
echo "<br>";
echo $from_id;
echo "<br>";
echo $message;

$link = mysqli_connect("latcs7.cs.latrobe.edu.au","18162111", "iloveyou","18162111");

$result = mysqli_query($link,"insert into messages(to_id,from_id,message) values('$to_id','$from_id', '$message')");

if($result){
$_SESSION['messagesent'] = true;
         header("Location: message.php?id={$to_id}");

}
else{
$_SESSION['messagesent'] = false;
         header("Location: message.php?id={$to_id}");
}


?>