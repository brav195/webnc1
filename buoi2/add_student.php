<?php
$success = ""; // tạo biến thông báo trống

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include "db_connect.php"; // kết nối DB

    // Lấy dữ liệu từ form
    $fullname = trim($_POST['fullname']);
    $student_code = trim($_POST['student_code']);
    $email = trim($_POST['email']);

    // Chuẩn bị câu lệnh INSERT
    $sql = "INSERT INTO students (fullname, student_code, email) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([$fullname, $student_code, $email])) {
        $success = "✔ Thêm sinh viên thành công!";
    } else {
        $success = "❌ Lỗi khi thêm sinh viên!";
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm sinh viên</title>
    <style>
        body {
            margin: 0;
            font-family: Poppins, Arial, sans-serif;
            background: linear-gradient(135deg, #090979, #4b6cb7);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            width: 420px;
            background: rgba(255, 255, 255, 0.12);
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.4);
            backdrop-filter: blur(12px);
            color: white;
            animation: showUp 0.8s ease;
        }

        @keyframes showUp {
            from { opacity: 0; transform: translateY(25px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            letter-spacing: 1px;
        }

        input {
            width: 100%;
            padding: 13px;
            margin-bottom: 18px;
            border-radius: 8px;
            border: none;
            font-size: 15px;
            outline: none;
        }

        button {
            width: 100%;
            padding: 13px;
            background: linear-gradient(135deg, #00b09b, #96c93d);
            border: none;
            border-radius: 8px;
            font-size: 17px;
            color: white;
            cursor: pointer;
            transition: 0.25s;
        }

        button:hover {
            transform: scale(1.03);
        }

        .success {
            margin-bottom: 18px;
            padding: 12px;
            background: rgba(0,255,150,0.2);
            border-left: 4px solid #00ff99;
            border-radius: 6px;
            color: #d4ffe6;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>➕ THÊM SINH VIÊN</h2>

    <?php if (!empty($success)): ?>
        <div class="success"><?= $success ?></div>
    <?php endif; ?>

    <form method="POST">
        <input type="text" name="fullname" placeholder="Nhập họ tên..." required>
        <input type="text" name="student_code" placeholder="Nhập mã sinh viên..." required>
        <input type="email" name="email" placeholder="Nhập email..." required>
        <button type="submit">Thêm mới</button>
    </form>
</div>

</body>
</html>
