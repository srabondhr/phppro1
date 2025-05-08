<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Role-Based Access Control - Rolepro</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="../public/index.php">Home</a></li>
                <li><a href="../public/login.php">Login</a></li>
                <li><a href="../public/register.php">Register</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="../public/logout.php">Logout</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
