<?php
require_once '../config/db.php';
require_once '../notifications/send_approval_notice.php';

class UserController {
    public function getAllUsers() {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM users");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function approveUser($userId) {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE users SET status = 'approved' WHERE id = ?");
        $result = $stmt->execute([$userId]);

        if ($result) {
            // Fetch the user's email
            $stmt = $pdo->prepare("SELECT email FROM users WHERE id = ?");
            $stmt->execute([$userId]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                // Send the approval notice
                // Approval notice sending has been canceled.

                // Create a notification for the user
                $this->createNotification($userId, "Your account has been approved!");
            }
        }

        return $result;
    }

    public function rejectUser($userId) {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE users SET status = 'rejected' WHERE id = ?");
        $result = $stmt->execute([$userId]);

        if ($result) {
            // Fetch the user's email
            $stmt = $pdo->prepare("SELECT email FROM users WHERE id = ?");
            $stmt->execute([$userId]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                // Send the rejection notice
                // Rejection notice sending has been canceled.

                // Create a notification for the user
                $this->createNotification($userId, "Your account has been rejected.");
            }
        }

        return $result;
    }

    private function createNotification($userId, $message) {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO notifications (user_id, message) VALUES (?, ?)");
        $stmt->execute([$userId, $message]);
    }

    public function changeUserRole($userId, $role) {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE users SET role = ? WHERE id = ?");
        return $stmt->execute([$role, $userId]);
    }

    public function deleteUser($userId) {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
        return $stmt->execute([$userId]);
    }
}
?>
