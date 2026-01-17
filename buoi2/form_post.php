<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Form POST</title>
</head>
<body>

<h2>Đăng ký (POST)</h2>

<form method="POST" action="">
    <input type="text" name="username" placeholder="Nhập tên..." required>
    <input type="password" name="password" placeholder="Nhập mật khẩu..." required>
    <button type="submit">Gửi</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    echo "<p>Đã nhận thông tin của <b>$username</b></p>";
}
?>

</body>
</html>
