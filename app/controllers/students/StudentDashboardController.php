<?php
namespace Students;

use App\Core\Controller;
use App\Core\Session;

class StudentDashboardController extends Controller {
    public function index() {
        $username = Session::get('username') ?? 'Guest';

        $this->view('students/dashboard', ['username' => $username]);
    }
}
