<?php
  //fetch username and password
  $username =  $_POST['username'];
  $password =  $_POST['password'];



  //write the sql statement
  $query = "select *
            FROM CUSTOMER
            WHERE username = '$username'AND
                  password = '$password'";

  //including the connection page
  include('./connect_to_db.php');

  //get an instance
  $db = new Connection();

  //connect to database
  $db->connect();

  //query the database
  $result = mysql_query( $query );

  //close once finished to free up resources
  $db->close();

 
  if( mysql_num_rows( $result ))
  { 
   $_SESSION['username']= $username; // store the username for later use
   
    // show order pizza form:
    ?>
    <?php include('./order_pizza.php'); ?>
    
  <?php
    exit();
  }
  else
  {
  
  
    //else redirect to login page with error message and reshow login box as below:
  ?>
    
  
 
 
      
      <form name="login">
       <table border="0" align="center"> 
        <tr><td height="500"> 
         <table> 
         </table>
         <br>
        <table border="0" bgcolor="#cccccc" align="center" valign="middle">
		<tr>
			<font color ="red"><center><b>Login unsuccessful - try again please! </b></center> </font><br>
		</tr>
         <tr>
          <td>Username: <input type="text" name="username"> </td>
         </tr>
         <tr>
          <td>Password: <input type="password" name="password"> </td>
         </tr>
         <tr>
          <td align="right"><input type="button" onclick="check()" value="Login"> </td>
         </tr>
        </table>
        </td></tr>
       </table>
      </form>
      
 

   
  <?php
    exit();
      

  }
?>
