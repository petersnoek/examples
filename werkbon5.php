<?php

require_once 'student.php';
require_once 'StudentCollection.php';

// make 2 students
$s = new Student('99009900', 'Peter', '', 'Snoek', 'Mollenburgseweg 82', '4205NB', 'Gorinchem', 'peter@snoek.nl');
$x = new Student('10000000', 'Nina', '', 'Mulder', '','','', 'nina@davinci.nl' );

// make collection and add the 2 new students
$col = new StudentCollection();
$col->Add($s);
$col->Add($x);

// print all firstnames
echo $col->GetFirstNamesULLI();

echo '<br/><br/>';

// show the json
echo $col->ToJson();

// now write the contents to a file
$col->WriteJsonToFile('test.json');