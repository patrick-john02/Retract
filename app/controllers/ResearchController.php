<?php
require_once __DIR__ . '/../models/Research.php';
require_once __DIR__ . '/../../middlewares/StudentMiddleware.php';
require_once __DIR__ . '/../core/Session.php';

use App\Core\Session;
use App\Middlewares\StudentMiddleware;

class ResearchController {
    
    public function myResearch() {
        Session::start();
        StudentMiddleware::check();

        $researchModel = new Research();
        $progressData = $researchModel->getMyResearchWithProgress(Session::get('user_id'));

        $username = Session::get('username') ?? 'Guest';

        $this->view('students/student_research', [
            'progressData' => $progressData,
            'username' => $username
        ]);
    }

    public function getResearchProgress() {
        Session::start();
        StudentMiddleware::check();
    
        $researchModel = new Research();
        return $researchModel->getResearchProgress();
    }


    private function view($viewPath, $data = []) {
        extract($data);
        require_once __DIR__ . "/../views/$viewPath.php";
    }
}
