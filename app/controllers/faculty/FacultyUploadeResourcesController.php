<?php
namespace Faculty;

use App\Core\Controller;
use App\Core\Session;

class FacultyUploadeResourcesController extends Controller {
    public function index() {
        $username = Session::get('username') ?? 'Guest';

        $this->view('faculty/resources', ['username' => $username]);
    }
}
