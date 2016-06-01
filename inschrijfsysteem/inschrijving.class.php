<?php

class Inschrijving {

    public $id;
    public $gegevens;

    function __construct($gegevens) {
        $this->gegevens = $gegevens;
    }
    
    function SaveToDb($link) {
        // bewaar mijzelf in de database
    }

}