
<?php

// importujeme připojení k DB a funkce
include 'DB.php';


// nový objekt -> DB
$db = new DB();
// zahájení připojení k DB
$conn = $db->connect();

// kontola HTTP metody
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// čtení vstupních dat - vytvoření
	$input = file_get_contents('php://input');
	$data = json_decode($input);

	$res = $db->createPerson($data->first_name, $data->last_name, $data->age, $data->phone_number);

	if( $res === TRUE){
		echo "Nový pojištěnec byl úspěsně vytvořený";
	} else {
		echo "Chyba: " . $sql . "<br>" . $conn->error;
	}
}
elseif($_SERVER['REQUEST_METHOD'] === 'GET') {

	$result = $db->readPersons();
	$persons = $result->fetch_all(MYSQLI_ASSOC);
	// pole pojistenec -> JSON a zobrazeni na frontendu
	echo json_encode($persons);
}
elseif($_SERVER['REQUEST_METHOD'] === 'PUT') {
	// čtení vstupních dat - úprava
	$input = file_get_contents('php://input');
	$data = json_decode($input);


	$res = $db->updatePerson($data->id,$data->first_name, $data->last_name, $data->age, $data->phone_number);

	if($res == TRUE){
		echo "Pojištěnec byl úspěšně modifikovaný";
	} else {
		echo "Chyba: " . $sql . "<br>" . $conn->error;
	}

}

$conn->close();
?>
