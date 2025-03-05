<?php

require_once __DIR__ . '/../core/Database.php';

class Research {
    private $conn;

    public function __construct() {
        $db = Database::getInstance();
        $this->conn = $db->getConnection();
    }

    public function getMyResearch($userId) {
        $sql = "SELECT * FROM research_papers WHERE submitted_by = ? AND is_deleted = 0 ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getResearchProgress() {
        $sql = "SELECT rp.id, rp.stage, rp.progress_details, rp.updated_at, 
                       r.title, r.status, u.full_name AS last_updated_by
                FROM research_progress rp
                JOIN research_papers r ON rp.research_id = r.id
                LEFT JOIN users u ON rp.updated_by = u.id
                ORDER BY rp.updated_at DESC";
                
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getMyResearchWithProgress($userId) {
        $sql = "SELECT r.id, r.title, r.status, r.submission_date, 
                       rp.stage, rp.progress_details, rp.updated_at, 
                       u.full_name AS last_updated_by
                FROM research_papers r
                LEFT JOIN research_progress rp ON r.id = rp.research_id
                LEFT JOIN users u ON r.last_updated_by = u.id
                WHERE r.submitted_by = ? AND r.is_deleted = 0
                ORDER BY rp.updated_at DESC";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getResearchById($researchId) {
        $sql = "SELECT r.*, u.full_name AS submitted_by_name
                FROM research_papers r
                LEFT JOIN users u ON r.submitted_by = u.id
                WHERE r.id = ? AND r.is_deleted = 0";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$researchId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
}

