
      <?php

$username = $_POST['email'];
$password =  $_POST['password'];
$fname = $_POST['firstname'];



  //write the sql statement
  $query = "insert into Login(username,name,password,user_type) values ('$username', '$fname', '$password','normal')";
  $link = mysqli_connect("latcs7.cs.latrobe.edu.au","18162111", "iloveyou","18162111");
  //including the connection page
//  include('./connect_to_db.php');

  //get an instance
  //$db = new Connection();

  //connect to database
  //$db->connect();

  //query the database
  mysqli_query($link,$query);

  //close once finished to free up resources
//  $db->close();
 header('Location: http://webprog.cs.latrobe.edu.au/~18162111/assign2/index.php');
 // include('http://webprog.cs.latrobe.edu.au/~18162111/assign2/index.php');

    exit();

    ?>


