<?php

// make sure our code knows about the Student class
require 'student.php';

// make database connection
$dblink = mysqli_connect('localhost', 'exampleuser', 'examplepassword', 'examples');

// Check if connection exists
if (!$dblink) {
  die("Connection error: " . mysqli_connect_error());
}

$s = new Student('91034567', 'Maaike', 'de', 'Vis', 'Laan van Nieuw Zeeland 3', '3798 DT', 'Dordrecht', 'mdevis@gmail.com');
$s->SaveToDb($dblink);

$dblink->close();

?>