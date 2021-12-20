<?php
$db = mysqli_connect("ludan.ddns.net","PHP","Gca7gPeAU9bU","PHP");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  header("HTTP/1.1 500 Internal Server Error");
  exit();
}
?>
