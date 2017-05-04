 <!DOCTYPE html>
    <html >
      <head>
        <meta charset="UTF-8">
        <title>Sign-Up/Login Form</title>
        <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="css/normalize.css">


            <link rel="stylesheet" href="css/style.css">
      </head>
      <body>
      <?php
session_start();
$username = $_POST['username'];
$password =  $_POST['password'];



  //write the sql statement
  $query = "select *
            FROM Login
            WHERE username = '$username'AND
                  password = '$password'";

  //including the connection page
   $link = mysqli_connect("latcs7.cs.latrobe.edu.au","18162111", "iloveyou","18162111");
   $result = mysqli_query($link,$query);
 // include('./connect_to_db.php');

  //get an instance
 // $db = new Connection();

  //connect to database
 // $db->connect();

  //query the database
//  $result = mysql_query( $query );

$row = mysqli_fetch_assoc($result);

  //close once finished to free up resources
//  $db->close();


  if( mysqli_num_rows( $result ))
  {
  echo "eh login hai";

   $_SESSION['username']= $username; // store the username for later use
    $_SESSION['id'] = $row['id'];
   $_SESSION['user_ty'] = $row['user_type'];
   if($_SESSION['user_ty'] == 'normal')
   {
    // show order pizza form:
    header("Location:afterLogin.php");
    }
    else if ($_SESSION['user_ty'] == 'admin')
    {
    header("Location:administer.php");
    }
   // include('./afterLogin.php');
    exit();
    }
    else
    {
    echo "Your username and password doesn't match !!";
    ?>


        <div class="form">

          <ul class="tab-group">
            <li class="tab active"><a href="#signup">Sign Up</a></li>
            <li class="tab"><a href="#login">Log In</a></li>
          </ul>

          <div class="tab-content">
            <div id="signup">
              <h1>Sign Up for Free</h1>

              <form action="/" method="post">

              <div class="top-row">
                <div class="field-wrap">
                  <label>
                    First Name<span class="req">*</span>
                  </label>
                  <input type="text" required autocomplete="off" />
                </div>

                <div class="field-wrap">
                  <label>
                    Last Name<span class="req">*</span>
                  </label>
                  <input type="text" required autocomplete = "off"/>
                </div>
              </div>

              <div class="field-wrap">
                <label>
                  Email Address<span class="req">*</span>
                </label>
                <input type="email" required autocomplete = "off"/>
              </div>

              <div class="field-wrap">
                <label>
                  Set A Password<span class="req">*</span>
                </label>
                <input type="password" required autocomplete="off"/>
              </div>

              <button type="submit" class="button button-block">Get Started</button>

              </form>

            </div>

            <div id="login">
              <h1>Welcome Back!</h1>

              <form action="login.php" method="post">

                <div class="field-wrap">
                <label>
                  Email Address<span class="req">*</span>
                </label>
                <input type="email" required autocomplete="on" name="username"/>
              </div>

              <div class="field-wrap">
                <label>
                  Password<span class="req">*</span>
                </label>
                <input type="password" name="password" required autocomplete="off"/>
              </div>

              <p class="forgot"><a href="#">Forgot Password?</a></p>

              <button class="button button-block">Log In</button>

              </form>

            </div>

          </div><!-- tab-content -->

    </div> <!-- /form -->
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

            <script src="js/index.js"></script>




      </body>
    </html>


    <?php
    exit();
    }
    ?>


