<?php

class Person {

	public function __construct($fn, $pf, $ln) { 
		$this->firstname = $fn;
		$this->prefix = $pf;
		$this->lastname = $ln; 
	} 

	public $firstname;
	public $prefix;
	public $lastname;

	public $displayname;

	public function ToString() {
		return $this->firstname . ' ' . $this->prefix . ' ' . $this->lastname;
	}
}