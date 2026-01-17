<?php
session_start();

// Tạo giỏ hàng nếu chưa có
if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = [];
}

// Danh sách sản phẩm
$products = [
    1 => ["name" => "Chuột Gaming", "price" => 150000],
    2 => ["name" => "Bàn phím Cơ", "price" => 500000],
    3 => ["name" => "Tai nghe Không dây", "price" => 300000]
];

// Xử lý thêm vào giỏ
if (isset($_GET["add"])) {
    $id = $_GET["add"];
    $_SESSION["cart"][] = $id;

    // CHỐNG thêm lại khi F5
    header("Location: cart.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Giỏ hàng</title>

<style>
body {
    font-family: Arial;
    background: #f4f4f4;
    margin: 0;
    padding: 0;
}

/* Container chia 2 cột */
.container {
    display: flex;
    justify-content: center;
    gap: 40px;
    margin-top: 40px;
}

/* Danh sách sản phẩm */
.products {
    width: 400px;
}

.product-card {
    background: white;
    padding: 20px;
    margin-bottom: 20px;
    border-radius: 10px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.15);
}

button {
    background: #4CAF50;
    color: white;
    padding: 10px 15px;
    border-radius: 6px;
    border: none;
    cursor: pointer;
}

/* Khung giỏ hàng */
.cart-box {
    width: 300px;
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.15);
    position: sticky;
    top: 20px;
}

.cart-item {
    border-bottom: 1px solid #eee;
    padding: 8px 0;
}

.empty {
    color: gray;
    font-style: italic;
}
</style>
</head>
<body>

<h2 style="text-align:center; margin-top:20px;">Danh sách sản phẩm</h2>

<div class="container">

    <!-- Danh sách sản phẩm -->
    <div class="products">
        <?php foreach ($products as $id => $p): ?>
        <div class="product-card">
            <h3><?= $p["name"] ?></h3>
            <p>Giá: <?= number_format($p["price"]) ?>đ</p>
            <a href="cart.php?add=<?= $id ?>"><button>Thêm vào giỏ</button></a>
        </div>
        <?php endforeach; ?>
    </div>

    <!-- Giỏ hàng -->
    <div class="cart-box">
        <h3>🛒 Giỏ hàng</h3>

        <?php
        if (empty($_SESSION["cart"])) {
            echo "<p class='empty'>Giỏ hàng đang trống...</p>";
        } else {
            foreach ($_SESSION["cart"] as $itemID) {
                echo "<div class='cart-item'>• " . $products[$itemID]["name"] . "</div>";
            }
        }
        ?>
    </div>

</div>

</body>
</html>
