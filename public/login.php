<?php
session_start();
include('../views/layout/header.php');
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    require_once '../controllers/AuthController.php';
    $authController = new AuthController();
    
    if ($authController->login($email, $password)) {
        header("Location: dashboard.php");
        exit();
    } else {
        echo "<p>Invalid credentials or your account is not approved yet.</p>";
    }
}
?>

<form action="login.php" method="POST">
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit" name="login">Login</button>
</form>

<?php include('../views/layout/footer.php'); ?>
