<?php
session_start();
include('../views/layout/header.php');

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    require_once '../controllers/AuthController.php';
    $authController = new AuthController();

    if ($authController->register($name, $email, $password, $role)) {
        echo "<p>Registration successful. Please wait for admin approval.</p>";
    } else {
        echo "<p>Registration failed. Please try again.</p>";
    }
}
?>

<form action="register.php" method="POST">
    <input type="text" name="name" placeholder="Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <select name="role">
        <option value="user">User</option>
        <option value="contributor">Contributor</option>
        <option value="editor">Editor</option>
    </select>
    <button type="submit" name="register">Register</button>
</form>

<?php include('../views/layout/footer.php'); ?>
