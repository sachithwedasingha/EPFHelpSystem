<?php

//include the db_conn.php
include_once('db_conn.php');


class Main{

    public function __construct()
    {
        $this->connObj = new Connection("localhost","root","","db_lo");

        $this->dbResult = $this->connObj->Conn();

        return($this->dbResult);
    }
}


?>