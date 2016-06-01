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

    public function GetStudentsWithFirstName($searchtext) {
        $found = [];  // nothing found, so return nothing (null)

        // get 1 student from the list; compare firstname; if match then store reference to the student in $found
        foreach ($this->students as $student) {
            if ( $student->FirstName == $searchtext ) array_push($found, $student);
        }

        return $found;
    }

    public function ToJson() {
        return json_encode($this->students);
    }

    public function WriteJsonToFile($filename) {
        return file_put_contents($filename, $this->ToJson() );
    }

    public function CreateStudentsFromJsonFile($filename){
        // read file
        // TODO: add errorhandling if file does not exist or is not readable
        $filecontents = file_get_contents($filename);

        $json = json_decode($filecontents);

        foreach($json as $j) {
            $s = new Student(
                $j->studentnumber,
                $j->firstname,
                $j->prefix,
                $j->lastname,
                $j->address,
                $j->postalcode,
                $j->city,
                $j->email);
            array_push($this->students, $s);
        }
    }

    public function RemoveByFirstname($seachfirstname){

        // loop over all students and take both key (0,1,2) and value(=student)
        foreach($this->students as $elementKey => $student ) {

            // for the current student, loop over all its properties
            foreach($student as $propertyname => $propertyvalue) {

                if($propertyname == 'FirstName' && $propertyvalue == $seachfirstname){
                    //delete this particular object from the $array
                    unset($this->students[$elementKey]);
                }
            }
        }
    }

}