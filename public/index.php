<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// include('../views/layout/header.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Rolepro</title>
    <link rel="stylesheet" href="../assets/css/style.css"> <!-- Added CSS -->
</head>
<body>
    
    <header>
        <nav>
            <a href="index.php">Home</a>
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="dashboard.php">Dashboard</a>
                <a href="logout.php">Logout</a>
            <?php else: ?>
                <a href="login.php">Login</a>
                <a href="register.php">Register</a>
            <?php endif; ?>
        </nav>
    </header>
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// include('../views/layout/header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Rolepro</title>
    <link rel="stylesheet" href="../assets/css/style.css"> 
    <link rel="icon" href="../assets/images/favicon.ico" type="image/x-icon">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="register.php">Register</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
    <main>
        <h1>Welcome to Roleplay</h1>
        <?php if (isset($_SESSION['user_id'])): ?>
            <p>Welcome back! Go to your <a href="dashboard.php">dashboard</a>.</p>
        <?php else: ?>
            <p>This is a Role-Play system. Please login or register to continue.</p>
        <?php endif; ?>
    </main>
    <script src="../assets/js/scripts.js"></script>
</body>
</html>
<?php
include('../views/layout/footer.php');
?>
    
    <h1>Welcome to Roleplay</h1>
    <?php if (isset($_SESSION['user_id'])): ?>
        <p>Welcome back! Go to your <a href="dashboard.php">dashboard</a>.</p>
    <?php else: ?>
        <p>This is a Role-Play system. Please login or register to continue.</p>
    <?php endif; ?>

    <script src="../assets/js/scripts.js"></script> <!-- Added JavaScript -->
</body>
</html>
<?php
include('../views/layout/footer.php');
?>
