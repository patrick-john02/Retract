<?php

require_once __DIR__ . '/../../core/Database.php';

class Profile {
    private $conn;

    public function __construct() {
        $db = Database::getInstance();
        $this->conn = $db->getConnection();
    }
 
}