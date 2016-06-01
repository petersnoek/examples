<?php

echo '<h1>Alle variabelen</h1><br>';
var_dump($_POST);

// require_once 'functions.php';
// InsertIntoInschrijfsysteem($gegevens);

require_once 'inschrijving.class.php';

$link = mysqli_connect('localhost', 'root', 'Studentje1', 'examples');
$i = new Inschrijving($gegevens);
$i->SaveToDb($link);

