<?php

require_once 'student.php';
require_once 'StudentCollection.php';

// make database connection or show error
$dblink = mysqli_connect('localhost', 'exampleuser', 'examplepassword', 'examples');
if (!$dblink) {
    die("Connection error: " . mysqli_connect_error());
}

// make students
$s = new Student('99009900', 'Peter', '', 'Snoek', 'Mollenburgseweg 82', '4205NB', 'Gorinchem', 'peter@snoek.nl');
$x = new Student('10000000', 'Nina', '', 'Mulder', '','','', 'nina@davinci.nl' );
$tristan = new Student('99000000', 'Tristan', 'de', 'Jager', 'Straatweg 12', '5647PC', 'Gorinchem', 'tristan@debaas.nl');
$jelle = new Student('99000001', 'Jelle', 'van den', 'Berg', 'Laanvaart 54', '1234RT', 'Ruckphen', 'jelle@jelleisdekoning.nl');
$pieter = $jelle;

// make collection and add the 2 new students
$col = new StudentCollection();
$col->Add($s);          // $col->students[0]
$col->Add($x);          // $col->students[1]
$col->Add($tristan);    // $col->students[2]
$col->Add($jelle);      // $col->students[3]
$col->Add($pieter);     // $col->students[4]

// save all students
foreach($col->students as $s) {
    $s->SaveToDb($dblink);
    echo '<br>Saved record $s->Id</br>';
}


// print all firstnames
echo $col->GetFirstNamesULLI();

echo '<br>Now change the firstname of Jelle to Jelluuuhhh';

// change $pieter
$col->students[3]->FirstName='Jelluuuhhh';

// print all firstnames
echo $col->GetFirstNamesULLI();

// is er een student met FirstName == 'Tristan' ?
echo '<br>Gevonden studenten met de naam Tristan:<br>';
$results = $col->GetStudentsWithFirstName('Tristan');

foreach($results as $r) {
    echo $r->FirstName . '<br>';
    $r->SaveToDb($dblink);
}


echo '<br/><br/>';

// show the json
echo $col->ToJson();


// now write the contents to a file
$col->WriteJsonToFile('test.json');