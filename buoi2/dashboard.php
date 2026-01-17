<?php
session_start();

// Nếu chưa đăng nhập -> đá về login
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<body>

<h2>Xin chào, <?php echo $_SESSION["user"]; ?>!</h2>

<a href="logout.php">Đăng xuất</a>

</body>
</html>
