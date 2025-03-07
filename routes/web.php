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

//faculty dashboard and other routes related to faculty
$router->addRoute('faculty-dashboard', 'Faculty\FacultyDashboardController', 'index');
$router->addRoute('manage-research', 'Faculty\FacultyManageResearchController', 'index');
$router->addRoute('manage-approved', 'Faculty\FacultyManageApprovedController', 'index');
$router->addRoute('manage-rejected', 'Faculty\FacultyManageRejectedController', 'index');
$router->addRoute('manage-published', 'Faculty\FacultyManagePubhlishedController', 'index');
$router->addRoute('upload-resources', 'Faculty\FacultyUploadeResourcesController', 'index');
$router->addRoute('faculty-profile', 'Faculty\FacultyProfileController', 'index');

//admin dashboard and other routes related to admin
$router->addRoute('admin-dashboard', 'Admin\AdminDashboardController', 'index');
$router->addRoute('manage-users', 'Admin\ManageUserController', 'index');
$router->addRoute('manage-researches', 'Admin\ManageResearchesController', 'index');
$router->addRoute('admin-approved', 'Admin\ManageApprovedController', 'index');
$router->addRoute('admin-rejected', 'Admin\ManageRejectedController', 'index');
$router->addRoute('admin-published', 'Admin\ManagePublishedController', 'index');
