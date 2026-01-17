<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Form GET</title>
</head>
<body>

<h2>Tìm kiếm (GET)</h2>

<form method="GET" action="">
    <input type="text" name="keyword" placeholder="Nhập từ khóa...">
    <button type="submit">Tìm</button>
</form>

<?php
if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
    echo "<p>Bạn đang tìm kiếm từ khóa: <b>$keyword</b></p>";
}
?>

</body>
</html>
