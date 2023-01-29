<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once 'db.php';
include_once 'Turns.php';
$database = new Database();

$db = $database->getConnection();


$items = new Turns($db);
$records = $items->getTurns(false);




$itemCount = $records->num_rows;
//echo json_encode($itemCount);
$datos = [];
if($itemCount > 0){
	while($row = $records->fetch_assoc()) {
		$datos[] = [
			'id' => $row['id'],
			'name' => $row['name'],
			'area' => $row['area'],
			'procedure_' => $row['procedure_'],
			'observation' => $row['observation'],
			'comment' => $row['comment'],
			'file' => $row['file'],
		];
	}//end while
	echo json_encode($datos);
}
else{
http_response_code(404);
echo json_encode(
array("message" => "No record found.")
);
}
?>