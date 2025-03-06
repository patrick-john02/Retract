<?php
require_once __DIR__ . '/../app/core/Router.php';
require_once __DIR__ . '/../app/controllers/AuthController.php';
require_once __DIR__ . '/../app/controllers/students/StudentDashboardController.php';
require_once __DIR__ . '/../app/controllers/ResearchController.php';

$router = new Router();

// Authentication routes
$router->addRoute('login', 'AuthController', 'showLoginForm');
$router->addRoute('login-post', 'AuthController', 'login');
$router->addRoute('logout', 'AuthController', 'logout');


//registration routes
$router->addRoute('register', 'AuthController', 'showRegisterForm'); 
$router->addRoute('register-post', 'AuthController', 'register');

//reset password routes
$router->addRoute('reset-password', 'AuthController', 'showResetPasswordForm'); 
$router->addRoute('reset-password-post', 'AuthController', 'resetPassword');

//student dashboards and other routes related to students
$router->addRoute('student-dashboard', 'Students\StudentDashboardController', 'index');
$router->addRoute('my-research', 'ResearchController', 'myResearch');
$router->addRoute('research-progress', 'ResearchController', 'getResearchProgress');

$router->addRoute('timeline', 'TimelineController', 'index');
$router->addRoute('student_profile', 'Students\StudentProfileController', 'index');

//faculty dashboardand other routes related to faculty
$router->addRoute('faculty-dashboard', 'Faculty\FacultyDashboardController', 'index');

//admin dashboard and other routes related to admin
$router->addRoute('admin-dashboard', 'Admin\AdminDashboardController', 'index');