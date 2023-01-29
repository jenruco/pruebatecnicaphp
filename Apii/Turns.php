<?php
class Turns{
// dbection
private $db;
// Table
private $db_table = "turns";
private $db_table_u = "users";
// Columns
public $id;
public $name;
public $area;
public $procedure_;
public $observation;
public $comment;
public $file;
public $result;


// Db dbection
public function __construct($db){
$this->db = $db;
}

// GET ALL
public function getTurns($flat){
    if($flat) $sqlQuery = "SELECT * FROM " . $this->db_table . " WHERE comment is null order by id desc";
    else $sqlQuery = "SELECT * FROM " . $this->db_table . " WHERE comment is not null order by id desc";
    $this->result = $this->db->query($sqlQuery);
    return $this->result;
}

// CREATE
public function createTurn(){
// sanitize
$this->name=htmlspecialchars(strip_tags($this->name));
$this->area=htmlspecialchars(strip_tags($this->area));
$this->procedure_=htmlspecialchars(strip_tags($this->procedure_));
$this->observation=htmlspecialchars(strip_tags($this->observation));
$sqlQuery = "INSERT INTO
". $this->db_table ." SET name = '".$this->name."',
area = '".$this->area."',
procedure_ = '".$this->procedure_."',observation = '".$this->observation."'";
$this->db->query($sqlQuery);
if($this->db->affected_rows > 0){
return true;
}
return false;
}

// UPDATE
public function getSingleTurn(){
$sqlQuery = "SELECT id, name, area, procedure_, observation FROM
". $this->db_table ." WHERE id = ".$this->id;
$record = $this->db->query($sqlQuery);
$dataRow=$record->fetch_assoc();
$this->name = $dataRow['name'];
$this->area = $dataRow['area'];
$this->procedure_ = $dataRow['procedure_'];
$this->observation = $dataRow['observation'];
}

// UPDATE
public function updateTurn(){
$this->name=htmlspecialchars(strip_tags($this->name));
$this->area=htmlspecialchars(strip_tags($this->area));
$this->procedure_=htmlspecialchars(strip_tags($this->procedure_));
$this->observation=htmlspecialchars(strip_tags($this->observation));
$this->comment=htmlspecialchars(strip_tags($this->comment));
$this->id=htmlspecialchars(strip_tags($this->id));

$sqlQuery = "UPDATE ". $this->db_table ." SET name = '".$this->name."',
area = '".$this->area."',
procedure_ = '".$this->procedure_."',observation = '".$this->observation."',comment = '".$this->comment."',file = '".$this->file."'
WHERE id = ".$this->id;

$this->db->query($sqlQuery);
if($this->db->affected_rows > 0){
return true;
}
return false;
}

// DELETE
function deleteTurn(){
$sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ".$this->id;
$this->db->query($sqlQuery);
if($this->db->affected_rows > 0){
return true;
}
return false;
}
}
?>