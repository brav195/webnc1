<?php
include "db_connect.php"; 
$success = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $hash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (email, password) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([$email, $hash]);
        $success = "Đăng ký thành công!";
    } catch (PDOException $e) {
        $error = "Email đã tồn tại!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Đăng ký tài khoản</title>
<style>
    body {
        font-family: Arial;
        background: linear-gradient(135deg, #8fd3f4, #84fab0);
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
        background: #4c7ff0;
        color: white;
        font-size: 16px;
        border-radius: 8px;
        cursor: pointer;
    }
    button:hover { background: #2f65d4; }
    .success { color: green; }
    .error { color: red; }
</style>
</head>
<body>

<div class="box">
    <h2>Đăng ký tài khoản</h2>

    <?php if ($success) echo "<p class='success'>$success</p>"; ?>
    <?php if ($error) echo "<p class='error'>$error</p>"; ?>

    <form method="POST">
        <input type="email" name="email" placeholder="Nhập email..." required>
        <input type="password" name="password" placeholder="Nhập mật khẩu..." required>
        <button type="submit">Đăng ký</button>
    </form>

    <p>Bạn đã có tài khoản? <a href="login.php">Đăng nhập</a></p>
</div>

</body>
</html>
