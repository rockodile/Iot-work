<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title></title>
  </head>
  <body>

    <?php
    $dbusername = "userdemo";
    $dbpassword = "123456789";
    $server = "localhost";

    $dbconnect = mysqli_connect($server, $dbusername, $dbpassword);
    $dbselect = mysqli_select_db($dbconnect, "demotable");

    	$sql="SELECT feed FROM 'demotable'";

    	$records=mysqli_query($dbconnect,$sql);
    	$json_array=array();

    	while($row=mysqli_fetch_assoc($records))
    	{
    		$json_array[]=$row;

    	}
    		/*echo '<pre>';
    		print_r($json_array);
    		echo '</pre>';*/
    	echo json_encode($json_array);
    ?>

  </body>
</html>
