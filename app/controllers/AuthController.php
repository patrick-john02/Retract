<?php
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../core/Session.php';
require_once __DIR__ . '/../core/View.php';
require_once __DIR__ . '/../models/students/Student.php';

use App\Core\Session;


class AuthController {
    private $userModel;
    private $studentModel;

    public function __construct() {
        $this->userModel = new User();
        $this->studentModel = new Student();
    }

    public function showLoginForm() {
        View::render('auth/login');
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usernameOrEmail = trim($_POST['username_or_email']);
            $password = trim($_POST['password']);
    
            $user = $this->userModel->findByUsernameOrEmail($usernameOrEmail);
    
            if ($user) {
                if ($this->userModel->verifyPassword($password, $user['password_hash'])) {
                    Session::start(); 
                    Session::set('user_id', $user['id']);
                    Session::set('username', $user['username']);
                    Session::set('role_id', $user['role_id']);
    
                    // Debug session values
                    // var_dump($_SESSION); 
                    // exit(); 
    
                    switch ($user['role_id']) {
                        case 1:
                            header('Location: /retract/public/admin-dashboard');
                            exit;
                        case 2:
                            header('Location: /retract/public/student-dashboard');
                            exit;
                        case 3:
                            header('Location: /retract/public/faculty-dashboard');
                            exit;
                        default:
                            Session::setFlash('error', 'Invalid role.');
                    }
                } else {
                    $error = 'Invalid password.';
                }
            } else {
                $error = 'User not found.';
            }
    
            View::render('auth/login', ['error' => $error ?? '']);
            return;
        }
    
        View::render('auth/login');
    }
    
    
      
    
    public function showRegisterForm() {
        View::render('auth/register');
    }
    
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fullName = trim($_POST['full_name']);
            $username = trim($_POST['username']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $studentId = trim($_POST['student_id']);
            $block = trim($_POST['block']);
            $course = trim($_POST['course']);

            if ($this->userModel->exists($username, $email)) {
                Session::setFlash('error', 'Username or Email already exists.');
                header('Location: /register');
                exit;
            }

            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            $roleId = 2;

            // Register user
            $userId = $this->userModel->createUser($username, $email, $passwordHash, $fullName, $roleId);

            if ($userId) {
                $this->studentModel->createStudent($userId, $studentId, $block, $course);
                Session::setFlash('success', 'Registration successful. Please log in.');
                header('Location: /login');
                exit;
            } else {
                Session::setFlash('error', 'Registration failed. Try again.');
                header('Location: /register');
                exit;
            }
        }
    }
    //reset password
    public function showResetPasswordForm() {
        View::render('auth/reset_password');
    }
    //reset password
    public function resetPassword() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email']);
            
            if (empty($email)) {
                Session::setFlash('error', 'Please enter your email.');
                header('Location: /reset-password');
                exit;
            }
    
            $user = $this->userModel->findByEmail($email);
    
            if (!$user) {
                Session::setFlash('error', 'No account found with that email.');
                header('Location: /reset-password');
                exit;
            }
    
            $newPassword = substr(md5(uniqid()), 0, 8);
            $passwordHash = password_hash($newPassword, PASSWORD_DEFAULT);
    
            if ($this->userModel->updatePassword($user['id'], $passwordHash)) {
                Session::setFlash('success', "Your new password is: $newPassword");
                header('Location: /login');
                exit;
            } else {
                Session::setFlash('error', 'Failed to reset password. Try again.');
                header('Location: /reset-password');
                exit;
            }
        }
    }
    
    public function logout() {
        \App\Core\Session::destroy();
        header('Location: /retract/public/login');
        exit;
    }
}