<?php
namespace Faculty;

use App\Core\Controller;
use App\Core\Session;

class FacultyDashboardController extends Controller {
    public function index() {
        $username = Session::get('username') ?? 'Guest';

        $this->view('faculty/dashboard', ['username' => $username]);
    }
}
