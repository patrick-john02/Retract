<?php
require_once __DIR__ . '/../core/Database.php';

class User {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }
    //login find the username or the email
    public function findByUsernameOrEmail($usernameOrEmail) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = ? OR email = ? LIMIT 1");
        $stmt->execute([$usernameOrEmail, $usernameOrEmail]);
        return $stmt->fetch();
    }
    //login verify the password of the users usertype
    public function verifyPassword($password, $hashedPassword) {
        return password_verify($password, $hashedPassword);
    }
    //for registration checking if the user exists
    public function exists($username, $email) {
        $stmt = $this->db->prepare("SELECT id FROM users WHERE username = ? OR email = ? LIMIT 1");
        $stmt->execute([$username, $email]);
        return $stmt->fetch() ? true : false;
    }
    //for registration creating a new student account
    public function createUser($username, $email, $passwordHash, $fullName, $roleId) {
        $stmt = $this->db->prepare("INSERT INTO users (username, email, password_hash, full_name, role_id) VALUES (?, ?, ?, ?, ?)");
        if ($stmt->execute([$username, $email, $passwordHash, $fullName, $roleId])) {
            return $this->db->lastInsertId();
        }
        return false;
    }
    //reset password find the email
    public function findByEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ? LIMIT 1");
        $stmt->execute([$email]);
        return $stmt->fetch();
    }
    //reset password update the password
    public function updatePassword($userId, $newPasswordHash) {
        $stmt = $this->db->prepare("UPDATE users SET password_hash = ? WHERE id = ?");
        return $stmt->execute([$newPasswordHash, $userId]);
    }
    

}
