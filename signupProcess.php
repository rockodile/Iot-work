<?php
  ini_set("session.save_path", "sessionData");
  session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Sign up - The Great North East</title>
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="">
  </head>
  <body>
  <div id="bigdamnwrapper">

    <div id="topbar">
      <img src="img\banner1.png"/>
    </div>
    <div class="divider"></div>
    <div class="blogpost">
      <?php
      	//Assign form values to PHP variables
      	$firstname = isset($_REQUEST['firstname']) ? $_REQUEST['firstname'] : null;
      	$surname = isset($_REQUEST['surname']) ? $_REQUEST['surname'] : null;
      	$username = isset($_REQUEST['username']) ? $_REQUEST['username'] : null;
      	$password = isset($_REQUEST['password']) ? $_REQUEST['password'] : null;
        $confirmpassword = isset($_REQUEST['confirmpassword']) ? $_REQUEST['confirmpassword'] : null;
        $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;

      	//Checks that forename and surname has been filled in
      	if(empty($firstname)){
      		die("<p>You have not entered your first name. <a href=\"home.php\">Go back</a></p>");
      	}
      	if(empty($surname)){
      		die("<p>You have not entered your surname. <a href=\"home.php\">Go back</a></p>");
      	}
        if(empty($username)){
      		die("<p>You have not entered your username. <a href=\"home.php\">Go back</a></p>");
      	}
        if(empty($password)){
      		die("<p>You have not entered your password. <a href=\"home.php\">Go back</a></p>");
      	}
        if(empty($confirmpassword)){
      		die("<p>You have not confirmed your password. <a href=\"home.php\">Go back</a></p>");
      	}
        if(empty($email)){
      		die("<p>You have not confirmed your email. <a href=\"home.php\">Go back</a></p>");
      	}

      	if(strlen($password) < 8){
          die("<p>Password must be at least 8 characters long. <a href=\"home.php\">Go back</a></p>");
        }
        if($password != $confirmpassword){
          die("<p>Passwords do not match. <a href=\"home.php\">Go back</a></p>");
        }
        if(strlen($username) < 5 || (strlen($username)) > 50){
          die("<p>Username must be between 5 and 50 characters long. <a href=\"home.php\">Go back</a></p>");
        }

      	//Make connection with database, echo error message in the event of failure
      	$conn = mysqli_connect('localhost', 'test', '123456789', 'test');
        	if (mysqli_connect_errno()) {
      		echo "<p>Connection failed:".mysqli_connect_error()."</p>\n";
        	}

        	//This stops any problems in SQL arising from names with apostrophes in them
      	$firstname = mysqli_escape_string($conn, $firstname);
      	$surname = mysqli_escape_string($conn, $surname);

        $passwordhash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "SELECT * FROM iot_users WHERE user_username = '$username'";
        $stmt = mysqli_prepare($conn, $sql) or die(mysqli_error($conn));

        if(mysqli_stmt_fetch($stmt)){
          die("<p>Username already exists. <a href=\"register.php\">Go back</a></p>");
        }
      	//Sets up the SQL insert statement
      	$insertSQL = "insert into iot_users (user_firstname, user_surname, user_username, user_hashpass, user_usertype, user_email) values ('$firstname', '$surname', '$username', '$passwordhash', 'user', '$email')";

      	//Executes the query, returns true if successful, false if unsuccessful
      	$success = mysqli_query($conn, $insertSQL) or die(mysqli_error($conn));

      	//Prints form details if query was successful, gives an error message if unsuccessful
      	if($success === true){
      		echo
      			"<br /><p> Success!, your information was recieved.</p>
      			<br />Registration:
      			<br />Name: $firstname $surname
      			<br />Username: $username
                <br />Email: $email</p>
            <br /><a href=\"home.php\">Go back</a>";
      	}
      	else{
      		echo "<p> Your information was not recieved. Please try again.</p>
      			<br /><a href=\"home.php\">Go home</a>";
      	}

            mysqli_close($conn);
      ?>
    </div>

  </body>

</html>
