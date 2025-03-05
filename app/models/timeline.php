<?php
require_once __DIR__ . '/../core/Database.php';

class Timeline {
    private $pdo; 

    public function __construct() {
        $this->pdo = Database::getInstance()->getConnection();
    }

    public function getTimelineByResearchId($researchId) {
        $sql = "SELECT rp.stage, rp.progress_details, rp.updated_at, 
                       u.full_name AS updated_by
                FROM research_progress rp
                LEFT JOIN users u ON rp.updated_by = u.id
                WHERE rp.research_id = ?
                ORDER BY rp.updated_at DESC";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$researchId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getResearchById($researchId) {
        $sql = "SELECT rp.*, 
               COALESCE(c.name, 'Unknown') AS category_name, 
               u.full_name AS submitted_by_name 
        FROM research_papers rp
        LEFT JOIN categories c ON rp.category_id = c.id
        LEFT JOIN users u ON rp.submitted_by = u.id
        WHERE rp.id = ? AND rp.is_deleted = 0";


        $stmt = $this->pdo->prepare($sql);  
        $stmt->execute([$researchId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getReviewsByResearchId($researchId) {
        $sql = "SELECT r.*, 
                       u.full_name AS reviewer_name 
                FROM reviews r
                JOIN users u ON r.reviewer_id = u.id
                WHERE r.research_id = ? 
                ORDER BY r.reviewed_at DESC";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$researchId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
