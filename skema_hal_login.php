<?php
session_start();
$username = "admin";
$password = "123";

if(isset($_GET['logout'])){
    session_destroy();
    header('Location: stems.php');
    exit();
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $user = $_POST["username"];
    $pass = $_POST["password"];
    if($user === $username && $pass === $password){
        $_SESSION["login"] = true;
        $_SESSION["user"] = $user;
    } else {
        $error = "Username atau password salah";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .error { color: red; }
    </style>
</head>
<body>
    <?php if (!isset($_SESSION['login'])): ?>
        <h2>Login</h2>
        <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
        <form method="post">
            <label>Username:</label><br>
            <input type="text" name="username" required><br><br>
            <label>Password:</label><br>
            <input type="password" name="password" required><br><br>
            <input type="submit" value="Login">
        </form>
    <?php else: ?>
        <h2>Halo <?php echo htmlspecialchars($_SESSION['user']); ?>!</h2>
        <p>Selamat datang di halaman dashboard</p>
        <a href="?logout=true">Logout</a>
    <?php endif; ?>
</body>
</html>