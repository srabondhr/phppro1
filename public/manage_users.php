<?php
session_start();
require_once '../config/db.php';

// Restrict access to admins only
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

// Fetch users
$stmt = $pdo->query("SELECT id, name, email, role, status FROM users");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Users</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <!-- Navbar -->
    <header>
        <nav>
            <a href="dashboard.php">Dashboard</a>
            <a href="manage_users.php">Manage Users</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>

    <h2>User Management</h2>
    <table border="1" cellpadding="10">
        <tr>
            <th>Name</th><th>Email</th><th>Role</th><th>Status</th><th>Action</th>
        </tr>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?= htmlspecialchars($user['name']) ?></td>
            <td><?= htmlspecialchars($user['email']) ?></td>
            <td><?= htmlspecialchars($user['role']) ?></td>
            <td><?= htmlspecialchars($user['status']) ?></td>
            <td>
                <a href="approve_user.php?id=<?= $user['id'] ?>">Approve</a> |
                <a href="delete_user.php?id=<?= $user['id'] ?>">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
