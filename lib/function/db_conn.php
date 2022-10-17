<?php
//databace Connection class
class Connection {

    //create the privet  variable
private $server;
private $user;
private $password;
private $database;

//call the constructor
public function __construct($server,$user,$pwd,$db)
{
    $this->server = $server;
    $this->user = $user;
    $this->password = $pwd;
    $this->database = $db;
}

//create connectin methord and exicute sql query
public function Conn(){
    $conn = new mysqli($this->server,$this->user,$this->password,$this->database);
    //ternery oparetion
    $result = (!$conn)?null:$conn;
    return($result);
}
}
?>