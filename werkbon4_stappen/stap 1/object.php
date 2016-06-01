<?php

class Time {
    
    public $lastvisit;
    
    
    function GetCurrentTime() {
        date_default_timezone_set('Europe/Amsterdam');
        $d = new DateTime();
        return $d->format('d-m-Y') . '<br>';
    }

    function GetLastVisit() {
        return $this->lastvisit->format('d-m-Y') . '<br>';
    }
}