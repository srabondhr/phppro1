<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once '../config/db.php';
require_once '../notifications/send_registration_alert.php';

class AuthController {
    public function register($name, $email, $password, $role) {
        global $pdo;
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
        $result = $stmt->execute([$name, $email, $hash, $role]);

        if ($result) {
            // Include the notification function and send the alert
            // Notification alert canceled as per request
        }

        return $result;
    }

    public function login($email, $password) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ? AND status = 'approved'");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_role'] = $user['role'];
            return true;
        }
        return false;
    }

    public function logout() {
        session_destroy();
        header("Location: login.php");
    }
}
?>