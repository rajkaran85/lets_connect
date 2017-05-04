<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
 <style type="text/css">
 body{
 margin:20px;
 }
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
</head>
 <script src="first.js"></script>
<body>
<?php
session_start();
$username = $_SESSION['username'];
$userid = $_SESSION['id'];
$to_id = intval($_GET['id']);

?>
<h3>Send Message</h3>
<form method="post" action="sendmessage.php">
<textarea cols="50" name="message" rows="7">


</textarea><br>
<input type="hidden" name="to_id" value=<?php echo $to_id;?> />
<input type="submit" value="SEND MESSAGE"/>
</form>
<?php
if(isset($_SESSION['messagesent'])){


if($_SESSION['messagesent'] == true){
echo 'Your message has been sent <span class="glyphicon glyphicon-ok"></span>';
}
else if($_SESSION['messagesent'] == false){
echo "Some error occured";
}

unset($_SESSION['messagesent']);
}


?><br>
<input type="submit" onclick ="returnToMain()" value="Go back"/>
</body>
</html>