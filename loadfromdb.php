<?php

// make sure our code knows about the Student class
require 'student.php';

// make database connection
$dblink = mysqli_connect('localhost', 'exampleuser', 'examplepassword', 'examples');

// Check if connection exists
if (!$dblink) {
  die("Connection error: " . mysqli_connect_error());
}

$s = new Student('', '', '', '', '', '', '', '');
$s->LoadFromDb($dblink, '3');

var_dump($s);

$dblink->close();

?>