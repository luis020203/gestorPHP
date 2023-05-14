<?php

// Create connection

$conn = new mysqli("LocalHost", "root", "" , "version_final");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}else {

}

?>