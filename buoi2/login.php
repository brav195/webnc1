<?php
include "db_connect.php";
session_start();
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = $_POST["email"];
    $password = $_POST["password"];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user["password"])) {
        $_SESSION["user"] = $user["email"];
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Sai email hoặc mật khẩu!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Đăng nhập</title>
<style>
    body {
        font-family: Arial;
        background: linear-gradient(135deg, #f6d365, #fda085);
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }
    .box {
        background: white;
        width: 350px;
        padding: 25px;
        border-radius: 10px;
        text-align: center;
        box-shadow: 0 3px 15px rgba(0,0,0,0.2);
    }
    .box h2 { margin-bottom: 20px; }
    input {
        width: 100%;
        padding: 10px;
        border-radius: 8px;
        border: 1px solid #aaa;
        margin-bottom: 15px;
    }
    button {
        width: 100%;
        padding: 10px;
        border: none;
        background: #f68657;
        color: white;
        font-size: 16px;
        border-radius: 8px;
        cursor: pointer;
    }
    button:hover { background: #e86837; }
    .error { color: red; }
</style>
</head>
<body>

<div class="box">
    <h2>Đăng nhập</h2>

    <?php if ($error) echo "<p class='error'>$error</p>"; ?>

    <form method="POST">
        <input type="email" name="email" placeholder="Nhập email..." required>
        <input type="password" name="password" placeholder="Nhập mật khẩu..." required>
        <button type="submit">Đăng nhập</button>
    </form>

    <p>Chưa có tài khoản? <a href="register.php">Đăng ký</a></p>
</div>

</body>
</html>
