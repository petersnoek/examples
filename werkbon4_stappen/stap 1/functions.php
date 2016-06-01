<?php

function PrintDate(){
    date_default_timezone_set('Europe/Amsterdam');
    $d = new DateTime();
    echo $d->format('d-m-Y').'<br>';
}