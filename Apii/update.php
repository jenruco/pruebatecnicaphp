<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once 'db.php';
include_once 'Turns.php';

$database = new Database();
$db = $database->getConnection();
$item = new Turns($db);

$data = json_decode(file_get_contents("php://input"), true);
// echo json_encode($data);
$item->id = $data['id'];
$item->name = $data['name'];
$item->area = $data['area'];
$item->procedure_ = $data['procedure_'];
$item->observation = $data['observation'];
$item->comment = $data['comment'];
$item->file = $data['file'];

if($item->updateTurn()){
echo json_encode("Turn data updated.");
} else{
echo json_encode("Data could not be updated");
}
?>