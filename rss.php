<?php


// stap 1: zoek een RSS feed
// antwoord: http://www.nu.nl/rss/


// stap 2: haal de hele RSS feed binnen in 1 variabele
include 'rssfunctions.php';
$feed = getFeed('http://www.nu.nl/rss/');
echo $feed;