<?php
namespace Faculty;

use App\Core\Controller;
use App\Core\Session;

class FacultyManageApprovedController extends Controller {
    public function index() {
        $username = Session::get('username') ?? 'Guest';

        $this->view('faculty/approved', ['username' => $username]);
    }
}
