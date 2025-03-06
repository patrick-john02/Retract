<?php
namespace Faculty;

use App\Core\Controller;
use App\Core\Session;

class FacultyProfileController extends Controller {
    public function index() {
        $username = Session::get('username') ?? 'Guest';

        $this->view('faculty/faculty_profile', ['username' => $username]);
    }
}
