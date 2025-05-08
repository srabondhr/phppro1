<?php
session_start();
require_once '../config/db.php';

if (!isset($_SESSION['user_id']) || ($_SESSION['user_role'] !== 'contributor' && $_SESSION['user_role'] !== 'user')) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$role = $_SESSION['user_role'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];

    
    $stmt = $pdo->prepare("INSERT INTO posts (user_id, title, content) VALUES (?, ?, ?)");
    if ($stmt->execute([$user_id, $title, $content])) {
        echo "Post added successfully.";
        header("Location: manage_posts.php");
        exit();
    } else {
        echo "Failed to add post.";
    }
}
?>

<form action="add_post.php" method="POST">
    <input type="text" name="title" placeholder="Post Title" required>
    <textarea name="content" placeholder="Post Content" required></textarea>
    <button type="submit">Add Post</button>
</form>
