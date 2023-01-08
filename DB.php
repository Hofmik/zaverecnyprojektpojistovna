<?php
class DB {


	// údaje pro připojení k DB
	private $host = 'localhost';
	private $username = 'root';
	private $password = '';
	private $database = 'pojistovna';
	private $port = 3306;
	// objekt -> připojení k DB
	
	private $conn;

	// připojení k DB
	public function connect() {
		$this->conn = new mysqli($this->host, $this->username, $this->password, $this->database , $this->port);
		if ($this->conn->connect_error) {
			die("Připojení selhalo:" . $this->conn->connect_error);
			return false;
		}
		return $this->conn;
	}

	// ukončení připojení k DB
	public function close() {
		$this->conn->close();
	}

	// zaslaní požadavku a vrácení výsledku
	public function query($sql) {
		$result = $this->conn->query($sql);
		return $result;
	}

	// vytvořit pojištěnce
	public function createPerson($first_name, $last_name, $age, $phone_number) {
		$sql = "INSERT INTO uzivatele (fname ,lname, age, pnumber) VALUES ('$first_name', '$last_name', $age, '$phone_number')";
		if ($this->conn->query($sql) === TRUE) {
			return TRUE;
		} else {
			return false;
		}
	 }

	// zobrazení pojištěnců
	public function readPersons() {
		$sql = "SELECT * FROM uzivatele";
		$result = $this->conn->query($sql);
		return $result;
	}

	// upravit pojištěnce
	public function updatePerson($id, $first_name, $last_name, $age, $phone_number) {
		$sql = "UPDATE uzivatele SET fname='$first_name', lname='$last_name', age=$age, pnumber='$phone_number' WHERE id=$id";
		if ($this->conn->query($sql) === TRUE) {
			return true;
		} else {
			return false ;
		}
	}

}

?>


