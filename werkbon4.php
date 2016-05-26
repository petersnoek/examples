<?php 

// make sure our code knows about class Student
include 'student.php';


// create new objects from class 'Student'
// ($sn, $fn, $pf, $ln, $add, $pc, $ct, $em)
$tristan = new Student('99000000', 'Tristan', 'de', 'Jager', 'Straatweg 12', '5647PC', 'Gorinchem', 'tristan@debaas.nl');
$jelle = new Student('99000001', 'Jelle', 'van den', 'Berg', 'Laanvaart 54', '1234RT', 'Ruckphen', 'jelle@jelleisdekoning.nl');
$pieter = $jelle;

echo 'Jelle: ' . $jelle->ToStringDisplayName();
echo '<br/>';
echo 'Pieter: ' . $pieter->ToStringDisplayName();
echo '<br/>';

echo 'Voornaam gewijzigd.<br>';

$jelle->FirstName = 'Jelluuuuh';


echo 'Jelle: ' . $jelle->ToStringDisplayName();
echo '<br/>';
echo 'Pieter: ' . $pieter->ToStringDisplayName();
echo '<br/>';

