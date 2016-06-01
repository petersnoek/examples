<?php

// werkbon 4 uitprobeer code


// load the student class so I can use it here
require_once 'student.class.php';

// make a new student object and store the reference in $s
$s = new Student('Marieke', 'van den', 'Berg');     // $s now points to the newly created object
var_dump($s);

echo '<h2>Full name:</h2>';
echo $s->GetFullName();

$x = new Student('Maarten','','Riemersma');     // $s now points to the newly created object

echo '<h2>Full name:</h2>';
echo $x->GetFullName();