<?php

    $dbusername = "userdemo";
    $dbpassword = "123456789";
    $server = "localhost";

    $dbconnect = mysqli_connect($server, $dbusername, $dbpassword);
    $dbselect = mysqli_select_db($dbconnect, "demotable");

	  $request= $_GET['request'];

    $sql = "INSERT INTO demotable.demotable (feed) VALUES ('$request')";

    mysqli_query($dbconnect, $sql);

?>
