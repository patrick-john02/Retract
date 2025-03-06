<?php
namespace Faculty;

use App\Core\Controller;
use App\Core\Session;

class FacultyManagePubhlishedController extends Controller {
    public function index() {
        $username = Session::get('username') ?? 'Guest';

        $this->view('faculty/published', ['username' => $username]);
    }
}
