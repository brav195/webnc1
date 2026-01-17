<?php
include "db_connect.php";

$sql = "SELECT * FROM students";
$stmt = $pdo->query($sql);
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách sinh viên</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #eef2f3;
            padding: 30px;
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            font-size: 28px;
            color: #333;
        }

        table {
            width: 80%;
            margin: auto;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 5px 20px rgba(0,0,0,0.2);
        }

        th, td {
            padding: 14px;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }

        th {
            background: #4a90e2;
            color: white;
            font-weight: bold;
        }

        tr:hover {
            background: #f3f9ff;
        }

        .action a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
            margin: 0 5px;
        }

        .action a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<h2>📋 DANH SÁCH SINH VIÊN</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Họ tên</th>
        <th>Mã SV</th>
        <th>Email</th>
        <th>Hành động</th>
    </tr>

    <?php foreach ($students as $sv): ?>
        <tr>
            <td><?= $sv['id'] ?></td>
            <td><?= htmlspecialchars($sv['fullname']) ?></td>
            <td><?= htmlspecialchars($sv['student_code']) ?></td>
            <td><?= htmlspecialchars($sv['email']) ?></td>
            <td class="action">
                <a href="#">Sửa</a> |
                <a href="#">Xóa</a>
            </td>
        </tr>
    <?php endforeach; ?>

</table>

</body>
</html>
