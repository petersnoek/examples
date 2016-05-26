<?php

// werkbon 4 uitprobeer code


// load the student class so I can use it here
require_once 'student.class.php';

// make a new student object and store the reference in $s
$s = new Student();     // $s now points to the newly created object
$s->name = 'Marieke';


// print the contents of $s
var_dump($s);

