<?php 

// the output of all functions assume that the info goes to a 
// database. No HTML formatting is done, so linebreaks <br>
// must be added to replace the PHP_EOL's 
class Student {

	public function __construct($sn, $fn, $pf, $ln, $add, $pc, $ct, $em) {
		$this->StudentNumber = $sn;
		$this->FirstName = $fn;
		$this->Prefix = $pf;
		$this->LastName = $ln; 
		$this->Address = $add;
		$this->PostalCode = $pc;
		$this->City = $ct;
		$this->Email = $em;
	} 

	public $Id;				// 47
	public $StudentNumber;	// 99012345
	public $FirstName;		// David
	public $Prefix;			// de
	public $LastName;		// Vos
	public $Address;		// Molenstraat 23
	public $PostalCode;		// 4309 RT  
	public $City;			// Vuren
	public $Email;			// david.de.vos@live.nl

	// example: David de Vos (99012345)
	public function ToStringDisplayName() {
		return $this->FirstName . ' ' 
		. $this->Prefix . ' ' 
		. $this->LastName 
		. ' (' . $this->StudentNumber . ')';	
	}

	// example: 
	// David de Vos
	// Molenstraat 23
	// 4309 RT  Vuren
	public function ToStringAddress() {
		return $this->FirstName . ' ' 
		. $this->Prefix . ' ' 
		. $this->LastName . PHP_EOL 
		. $this->Address  . PHP_EOL 
		. $this->PostalCode . '  ' . $this->City;
	}

	// example: David de Vos <david.de.vos@live.nl>
	public function ToStringEmail() {
		return $this->FirstName . ' ' 
		. $this->Prefix . ' ' 
		. $this->LastName 
		. ' &lt;' . $this->Email . '&gt;';	
	}	

	// pass a valid MySQLi Database Connection
	public function SaveToDb($dblink) {

		// now insert a new record to table 
		$sql = "INSERT INTO students (StudentNumber, FirstName, Prefix, LastName, Address, PostalCode, City, Email)  VALUES ('$this->StudentNumber', '$this->FirstName', '$this->Prefix', '$this->LastName', '$this->Address', '$this->PostalCode', '$this->City', '$this->Email')";

		if ($dblink->query($sql) === TRUE) {
		    echo "New record created successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . $dblink->error;
		}
	}

	public function LoadFromDb($dblink, $id) {
		$sql = "SELECT * FROM students WHERE Id=" . $id;

		$result = $dblink->query($sql);

		if ($result->num_rows == 1) {
		    // output data of each row
			$row = $result->fetch_assoc();

			$this->Id = $row['Id'];
			$this->StudentNumber = $row['StudentNumber'];
			$this->FirstName = $row['FirstName'];
			$this->Prefix = $row['Prefix'];
			$this->LastName = $row['LastName']; 
			$this->Address = $row['Address'];
			$this->PostalCode = $row['PostalCode'];
			$this->City = $row['City'];
			$this->Email = $row['Email'];
		} elseif ($result->num_rows == 0) {
		    echo "0 rows found";
		}	
		elseif ($result->num_rows > 1) {
		    echo "more than 1 rows found";
		}	
	}


}