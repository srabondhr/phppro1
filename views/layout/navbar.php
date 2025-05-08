<?php if (isset($_SESSION['user_role'])): ?>
    <ul>
        <?php if ($_SESSION['user_role'] == 'admin'): ?>
            <li><a href="../public/admin_dashboard.php">Admin Dashboard</a></li>
        <?php elseif ($_SESSION['user_role'] == 'editor'): ?>
            <li><a href="../public/editor_dashboard.php">Editor Dashboard</a></li>
        <?php elseif ($_SESSION['user_role'] == 'contributor'): ?>
            <li><a href="../public/contributor_dashboard.php">Contributor Dashboard</a></li>
        <?php elseif ($_SESSION['user_role'] == 'user'): ?>
            <li><a href="../public/user_dashboard.php">User Dashboard</a></li>
        <?php endif; ?>
    </ul>
<?php endif; ?>
