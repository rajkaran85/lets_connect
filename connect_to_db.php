<?php

class Connection

{



  function connect()

  {

    $connection_url="latcs7.cs.latrobe.edu.au";

    $username='18162111'; // use your own mysql user name

    $password='iloveyou'; // use your own mysql password

    $db_name='18162111';

//echo "connecting to db...";

    //make a conection to the database

    mysql_connect( "$connection_url","$username","$password" ) OR

         die("Could Not Connect to Database");



    // select the database to use

    mysql_select_db( "$db_name" ) OR

          die("Failed Selecting to DB");

  }



  function close()

  {

    mysql_close();

  }

}

?>