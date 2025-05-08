<?php
session_start();
require_once '../config/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];


$stmt = $pdo->prepare("SELECT role FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
   
    header("Location: logout.php");
    exit();
}


$_SESSION['user_role'] = $user['role'];
$role = $user['role'];


$stmt = $pdo->prepare("SELECT * FROM notifications WHERE user_id = ? AND status = 'unread'");
$stmt->execute([$user_id]);
$notifications = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($notifications as $notification) {
    echo "<p>" . htmlspecialchars($notification['message']) . "</p>";
    
    $updateStmt = $pdo->prepare("UPDATE notifications SET status = 'read' WHERE id = ?");
    $updateStmt->execute([$notification['id']]);
}


if ($role === 'admin') {
    include '../views/dashboard/admin.php';
} elseif ($role === 'editor') {
    include '../views/dashboard/editor.php';
} elseif ($role === 'contributor') {
    include '../views/dashboard/contributor.php';
} elseif ($role === 'user') {
    include '../views/dashboard/user.php';
} else {
    header("Location: not_approved.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/css/style.css"> 
</head>
<body>
   

    <script src="../assets/js/scripts.js"></script> 
</body>
</html>
