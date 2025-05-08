<form action="../public/register.php" method="POST">
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