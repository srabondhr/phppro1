<?php
require_once './config/db.php';

class BlogController {
    public function getAllPosts() {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM blog_posts ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPostById($id) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM blog_posts WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createPost($title, $content, $authorId) {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO blog_posts (title, content, author_id) VALUES (?, ?, ?)");
        return $stmt->execute([$title, $content, $authorId]);
    }

    public function updatePost($id, $title, $content) {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE blog_posts SET title = ?, content = ? WHERE id = ?");
        return $stmt->execute([$title, $content, $id]);
    }

    public function deletePost($id) {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM blog_posts WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>