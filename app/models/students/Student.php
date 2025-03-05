<?php
require_once __DIR__ . '/../../core/Database.php';

class Student {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function createStudent($userId, $studentId, $block, $course) {
        $stmt = $this->db->prepare("INSERT INTO students (user_id, student_id, block, course) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$userId, $studentId, $block, $course]);
    }
}
