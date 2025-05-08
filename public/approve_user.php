<?php
require_once '../config/db.php';

if (!isset($_GET['id'])) {
    die("No user ID provided.");
}

$user_id = intval($_GET['id']);


$stmt = $pdo->prepare("UPDATE users SET status = 'approved' WHERE id = ?");
if ($stmt->execute([$user_id])) {
    echo "User approved successfully.";
    
    header("Location: manage_users.php");
    exit();
} else {
    echo "Failed to approve user.";
}
?>
