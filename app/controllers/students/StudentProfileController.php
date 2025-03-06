<?php
namespace Students;
require_once __DIR__ . '/../../models/students/profile.php';

use App\Core\Controller;
use App\Core\Session;

class StudentProfileController extends Controller {
    public function index() {
        $username = Session::get('username') ?? 'Guest';

        $this->view('students/student_profile', ['username' => $username]);
    }
}
