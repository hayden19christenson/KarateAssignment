<?php

$servername = "rei.cs.ndsu.nodak.edu";
$username = "hayden_christenson_371s23";
$password = "oeDfknnajN0!";
$db = "hayden_christenson_db371s23";

$database = mysqli_connect($servername, $username, $password, $db);

if (mysqli_connect_errno()) {
   die("Connect failed: %s\n" + mysqli_connect_error());
   exit();
} 
else{echo "Connected successfully";

}

?>
