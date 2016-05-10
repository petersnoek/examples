<?php 

include_once 'person.php';

class Student extends Person {

	public function __construct($fn, $pf, $ln, $nr) { 
		$this->firstname = $fn;
		$this->prefix = $pf;
		$this->lastname = $ln; 
		$this->number = $nr;
	} 

	public $number;

	// example: Peter (99012345)
	public function ToString() {
		return $this->firstname . ' ' . $this->prefix . ' ' . $this->lastname . ' (' . $this->number . ')';	}

}