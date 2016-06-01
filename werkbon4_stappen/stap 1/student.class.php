<?php

class student
{
    public $FirstName;
    public $Prefix;
    public $LastName;

    function __construct($fn, $pf, $ln) {
        $this->FirstName = $fn;
        $this->Prefix = $pf;
        $this->LastName = $ln;
    }

    // example output: Marieke van den Berg
    function GetFullName() {
        $out = $this->FirstName . ' ' ;
        if ( strlen($this->Prefix > 0) ) $out = $out . $this->Prefix . ' ';
        $out = $out . $this->LastName;
        return $out;
    }
    
    


}