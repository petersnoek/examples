<?php

require_once 'inc/class.TemplatePower.inc.php';


// template should have a month_row block for every month row,
// template should have a month_cell block which will be repeated 24 times
// array should have 24 values.
// if you want to make 1 cell pink, then pass the number of that cell as $redindex (first cell = 0)
function AddMonthrowToTemplate($tpl, $array, $redindex = -1) {

    $tpl->newBlock('month_row');

    for ($i=0; $i<=23; $i++) {
        $tpl->newBlock('month_cell');

        if ( $i == $redindex )
            $tpl->assign('class', 'monthday red');
        else
            $tpl->assign('class', 'monthday');

        $tpl->assign('cell', $array[$i] );
    }
}

function CreateArrayWith24Dates($format = 'd/m') {
    // create array with 24 days
    date_default_timezone_set('Europe/Amsterdam');
    // get the daynumber of today (sunday = 0, monday = 1, etc)
    $today = new DateTime();                    // 2016-5-26
    $daynumber = $today->format('w');           // thursday - 4
    $monday = new DateTime('tomorrow - ' . $daynumber . ' days');
    $days = [];
    $startdate = $monday;
    for ($i = 0; $i < 24 ; $i++) {
        $dag = new DateTime($startdate->format('Y-m-d'));
        $datestring = $dag->format($format);
        array_push($days, $datestring);
        $startdate = $startdate->add(DateInterval::createfromdatestring('+1 day'));
    }
    return $days;
}