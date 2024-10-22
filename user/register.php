// /user/register.php
<?php
require '../common/db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $captcha = $_POST['captcha'];

    if ($captcha === $_SESSION['captcha_code']) {
        $usersCollection->insertOne([
            'username' => $username,
            'password' => $password
        ]);
        echo "Registration successful!";
    } else {
        echo "Invalid CAPTCHA!";
    }
}
?>
<img src="../common/captcha.php" alt="CAPTCHA">
<form method="POST">
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    CAPTCHA: <input type="text" name="captcha" required><br>
    <input type="submit" value="Register">
</form>
