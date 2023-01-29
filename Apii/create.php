<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once 'db.php';
include_once 'Turns.php';
$database = new Database();
$db = $database->getConnection();
$item = new Turns($db);

$data = json_decode(file_get_contents("php://input"), true);


$item->name = $data['name'];
$item->area = $data['area'];
$item->observation = $data['observation'];
$item->procedure_ = $data['procedure_'];




if($item->createTurn()){
echo json_encode('Turn created successfully.');
} else{
echo json_encode('Turn could not be created.');
}
?>