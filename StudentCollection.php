<?php

require_once 'student.php';

// keeps a collection of Student objects
// with some search functions
// and some functions to store the collection in a file and in a database
class StudentCollection {

    // properties
    public $students;  // array with the student objects

    // constructor; is called when we call "new StudentCollection"
    public function __construct() {
        $this->students = [];       // make sure Students is empty array
    }

    public function Add($student) {
        array_push($this->students, $student);
    }

    public function GetFirstNamesArray() {
        $names = [];

        foreach ($this->students as $student) {
            array_push($names, $student->FirstName);
        }

        return $names;
    }

    public function GetFirstNamesULLI() {
        $out = '<ul>';

        foreach ($this->students as $student) {
            $out .= '<li>' .  $student->FirstName . '</li>' ;
        }

        $out .= '</ul>';

        return $out;
    }

    public function ToJson() {
        return json_encode($this->students);
    }

    public function WriteJsonToFile($filename) {
        return file_put_contents($filename, $this->ToJson() );
    }

}