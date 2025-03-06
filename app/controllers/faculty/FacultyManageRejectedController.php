<?php
namespace Faculty;

use App\Core\Controller;
use App\Core\Session;

class FacultyManageRejectedController extends Controller {
    public function index() {
        $username = Session::get('username') ?? 'Guest';

        $this->view('faculty/rejected', ['username' => $username]);
    }
}
