<?php
session_start();
require_once __DIR__ . '/config/database.php';
// Lấy id sản phẩm từ POST
$id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
$qty = isset($_POST['qty']) ? (int)$_POST['qty'] : 1;
if ($id <= 0) {
    echo json_encode(['success' => false, 'message' => 'Invalid product']);
    exit;
}
// Kiểm tra sản phẩm tồn tại và còn hàng
$stmt = $pdo->prepare('SELECT * FROM products WHERE id = ?');
$stmt->execute([$id]);
$product = $stmt->fetch();
if (!$product || $product['stock'] < $qty) {
    echo json_encode(['success' => false, 'message' => 'Product not found or out of stock']);
    exit;
}
// Thêm vào giỏ hàng trong session
if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
if (isset($_SESSION['cart'][$id])) {
    $_SESSION['cart'][$id] += $qty;
} else {
    $_SESSION['cart'][$id] = $qty;
}
echo json_encode(['success' => true, 'message' => 'Added to cart']);
exit;
