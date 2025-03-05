<?php
require_once __DIR__ . '/../models/Timeline.php'; 
// require_once __DIR__ . '/../models/Research.php'; 
require_once __DIR__ . '/../core/Session.php'; 

use App\Core\Session;

class TimelineController {
    public function index($params = []) { 
        Session::start();
        
        $researchId = $params['id'] ?? $_GET['id'] ?? null;
    
        if (!$researchId) {
            die('Invalid research ID');
        }
    
        // Fetch research details
        $researchModel = new Research();
$researchDetails = $researchModel->getResearchById($researchId);

        
        // Fetch timeline data
        $timelineModel = new Timeline();
        $timelineData = $timelineModel->getTimelineByResearchId($researchId);
    
        // Fetch reviews data
        $reviews = $timelineModel->getReviewsByResearchId($researchId);
        
        // Load the view
        require_once __DIR__ . '/../views/students/timeline.php';
    }    
    public function showResearch($researchId) {
        $researchModel = new Research();
        $reviewModel = new Review();

        $researchDetails = $researchModel->getResearchById($researchId);
        $reviews = $reviewModel->getReviewsByResearchId($researchId);

        require_once __DIR__ . '/../views/students/timeline.php';
    }
    
}
