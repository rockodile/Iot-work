<?php
  ini_set("session.save_path", "sessionData");
  session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Home</title>
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="">
  </head>
  <body>
  <div id="bigdamnwrapper">

    <div id="topbar">
      <img src="img\banner1.png"/>
        <nav>
          <ul>
            <li>
              <a href="home.php">Home</a>
            </li>
            <?php
              if(isset($_SESSION['admin-logged-in'])){
                echo "<li><a href=\"admin.php\">Admin</a></li>";
              }else if(isset($_SESSION['user-logged-in'])){
                echo "<li><a href=\"devices.php\">Devices</a></li>";
              }
            ?>
          </ul>
          <?php
            if (isset($_SESSION['uName'])) {
              $username = $_SESSION['uName'];
              echo "<div><p>Logged in as: $username</p>
              <form method=\"post\" action=\"logoutProcess.php\">
              <input type=\"submit\" value=\"Logout\"></div>
              </form>";
            }else{
              echo "<div><form method=\"post\" action=\"loginProcess.php\">
                    <div>Username <input type=\"text\" name=\"username\">
    		            Password <input type=\"password\" name=\"password\">
                    <input type=\"submit\" value=\"Login\"></div></form></div>
                    </form>";
            }
          ?>
            <a href="#" class="fa fa-facebook"></a>
            <a href="#" class="fa fa-twitter"></a>
            <a href="#" class="fa fa-instagram"></a>
        </nav>
    </div>

    <div class="blogpost">
      <h1>Welcome</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum..</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      <img src="img/iot.png" />
    </div>

  </body>

</html>
