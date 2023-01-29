<?php
class User{
// dbection
private $db;
// Table
private $db_table = "users";
// Columns
public $id;
public $nameUser;
public $password;
public $result;


    // Db dbection
    public function __construct($db){
        $this->db = $db;
    }

    public function login(){
       
         $sqlQuery = "SELECT * FROM ". $this->db_table ." WHERE nameUser = '" . $this->nameUser ."' and password = '" . $this->password ."'";
         $record = $this->db->query($sqlQuery);
         $dataRow=$record->fetch_assoc();
         $this->id = $dataRow['id'];
         $this->nameUser = $dataRow['nameUser'];
         $this->password = $dataRow['password'];
    }

    public function createUser(){
        // sanitize
        $this->nameUser=htmlspecialchars(strip_tags($this->nameUser));
        $this->password=htmlspecialchars(strip_tags($this->password));
        $sqlQuery = "INSERT INTO
        ". $this->db_table ." SET nameUser = '".$this->nameUser."',
        password = '".$this->password."'";
        $this->db->query($sqlQuery);
        if($this->db->affected_rows > 0){
            return true;
        }
            return false;
        }
}
?>