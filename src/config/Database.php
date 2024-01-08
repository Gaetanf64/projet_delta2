<?php

namespace App\config;

use PDO;


abstract class Database
{

    protected $db;

    /**
     * On charge la db
     * 
     */
    public function setDb()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=delta2;charset=utf8', 'root', '');

        //Errors
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

        return $this->db;
    }
}


?>