<?php
session_start();
require_once '../config/db.php';

if (!isset($_SESSION['user_id']) || ($_SESSION['user_role'] !== 'admin' && $_SESSION['user_role'] !== 'editor')) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$role = $_SESSION['user_role'];


$stmt = $pdo->prepare("
    SELECT posts.id, posts.title, posts.content, posts.created_at, users.name AS user_name, users.id AS user_id
    FROM posts
    JOIN users ON posts.user_id = users.id
    ORDER BY posts.created_at DESC
");
$stmt->execute();
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Posts</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        
        .post-container {
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 15px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }
        .post-title {
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }
        .post-content {
            margin: 10px 0;
            color: #555;
        }
        .post-meta {
            font-size: 14px;
            color: #777;
        }
        .post-actions a {
            color: #1abc9c;
            text-decoration: none;
            margin-right: 10px;
        }
        .post-actions a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Manage Posts</h1>
    <a href="dashboard.php" class="back-button">Back to Dashboard</a>

    <?php foreach ($posts as $post): ?>
        <div class="post-container">
            <p class="post-title"><?= htmlspecialchars($post['title']) ?></p>
            <p class="post-content"><?= htmlspecialchars($post['content']) ?></p>
            <p class="post-meta">
                Posted by: <?= htmlspecialchars($post['user_name']) ?> (User ID: <?= htmlspecialchars($post['user_id']) ?>) on <?= htmlspecialchars($post['created_at']) ?>
            </p>
            <p class="post-actions">
                <a href="edit_post.php?id=<?= $post['id'] ?>">Edit</a> | 
                <a href="delete_post.php?id=<?= $post['id'] ?>">Delete</a>
            </p>
        </div>
    <?php endforeach; ?>
</body>
</html>
