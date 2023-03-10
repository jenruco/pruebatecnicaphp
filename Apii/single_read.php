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
$item->id = isset($_GET['id']) ? $_GET['id'] : die();
$item->getSingleTurn();
if($item->name != null){

// create array
$emp_arr = array(
"id" => $item->id,
"name" => $item->name,
"area" => $item->area,
"procedure_" => $item->procedure_,
"observation" => $item->observation
);

http_response_code(200);
echo json_encode($emp_arr);
}
else{
http_response_code(404);
echo json_encode("Turn not found.");
}
?>