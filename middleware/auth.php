<?php
session_start();

function checkAuth() {
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit;
    }
}

function isAdmin() {
    if ($_SESSION['user_role'] !== 'admin') {
        header("Location: not_approved.php");
        exit;
    }
}

function isEditor() {
    if ($_SESSION['user_role'] !== 'editor') {
        header("Location: not_approved.php");
        exit;
    }
}

function isContributor() {
    if ($_SESSION['user_role'] !== 'contributor') {
        header("Location: not_approved.php");
        exit;
    }
}

function isUser() {
    if ($_SESSION['user_role'] !== 'user') {
        header("Location: not_approved.php");
        exit;
    }
}

function isPending() {
    if ($_SESSION['user_role'] === 'pending') {
        header("Location: approval_pending.php");
        exit;
    }
}
?>
