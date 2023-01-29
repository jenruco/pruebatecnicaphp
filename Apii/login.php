<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once 'db.php';
include_once 'User.php';
$database = new Database();
$db = $database->getConnection();
$item = new User($db);

$data = json_decode(file_get_contents("php://input"), true);


 $item->nameUser = $data['nameUser'];
 $item->password = $data['password'];
 
 $item->login();
 //echo json_encode($item);
if($item->nameUser != null){

// create array
$emp_arr = array(
"id" => $item->id,
"nameUser" => $item->nameUser
);

http_response_code(200);
echo json_encode($emp_arr);
}
else{
http_response_code(404);
echo json_encode("Turn not found.");
}
?>