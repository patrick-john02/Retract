<?php
namespace Faculty;

use App\Core\Controller;
use App\Core\Session;

class FacultyManageResearchController extends Controller {
    public function index() {
        $username = Session::get('username') ?? 'Guest';

        $this->view('faculty/manage_research', ['username' => $username]);
    }
}
