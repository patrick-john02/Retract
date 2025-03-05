<?php
namespace Admin;

use App\Core\Controller;
use App\Core\Session;

class AdminDashboardController extends Controller {
    public function index() {
        // Get username from session
        $username = Session::get('username') ?? 'Guest';

        // Pass username to the view
        $this->view('admin/dashboard', ['username' => $username]);
    }
}
