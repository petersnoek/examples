<?php

date_default_timezone_set('Europe/Amsterdam');

// get the daynumber of today (sunday = 0, monday = 1, etc)
$today = new DateTime();                    // 2016-5-25
$daynumber = $today->format('w');           // wednesday - 3
$monday = new DateTime('today - ' . $daynumber . ' days');

// print this for debugging purpose
echo 'Today = ' . $today->format('Y-m-d') . '<br>';
echo 'Daynumber = ' . $daynumber . '<br>';
echo 'The Monday = ' . $monday->format('Y-m-d') . '<br>';


// create array with 24 days
$days = [];
$startdate = $monday;
for ($i = 0; $i < 24 ; $i++) {
    array_push($days, new DateTime($startdate->format('Y-m-d')));
    $startdate = $startdate->add(DateInterval::createfromdatestring('+1 day'));
}

echo '<br>';

// print the days array
foreach ($days as $day) {
    $todaystyle = '';
    if ($day->format('Y-m-d') == $today->format('Y-m-d') ) {
        $todaystyle = ' style="color:red;" ';
    }

    echo '<div ' . $todaystyle . '>' . $day->format('D d/m') . '</div>';
}