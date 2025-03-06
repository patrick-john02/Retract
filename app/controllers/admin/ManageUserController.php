<?php
namespace ManageUsers;

use App\Core\Controller;
use App\Core\Session;

class ManageUsers extends Controller {
    public function index() {
        // Get username from session
        $username = Session::get('username') ?? 'Guest';

        // Pass username to the view
        $this->view('admin/manage_users', ['username' => $username]);
    }
}
