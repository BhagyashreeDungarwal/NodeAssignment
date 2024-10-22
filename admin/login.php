// /admin/login.php
<?php
session_start();
require '../common/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Simple admin validation (replace with a database check in a real app)
    if ($username === 'admin' && $password === 'adminpass') {
        $_SESSION['admin_logged_in'] = true;
        header('Location: category.php');
        exit();
    } else {
        echo "Invalid Credentials";
    }
}
?>
<form method="POST">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="submit" value="Login">
</form>
