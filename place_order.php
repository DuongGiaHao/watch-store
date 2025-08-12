<?php
session_start();
require_once __DIR__ . '/config/database.php';
if (empty($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'You need to login to order']);
    exit;
}
$cart = $_SESSION['cart'] ?? [];
if (!$cart) {
    echo json_encode(['success' => false, 'message' => 'Your cart is empty']);
    exit;
}
$user_id = $_SESSION['user_id'];
$order_code = 'ORD' . time();
$note = '';
$status = 'Pending';
$subtotal = 0;
$tax_fee = 0;
$total = 0;
$order_products = [];
$ids = array_keys($cart);
if ($ids) {
    $placeholders = implode(',', array_fill(0, count($ids), '?'));
    $stmt = $pdo->prepare('SELECT * FROM products WHERE id IN (' . $placeholders . ')');
    $stmt->execute($ids);
    $products = $stmt->fetchAll(PDO::FETCH_UNIQUE);
    foreach ($cart as $id => $qty) {
        $p = $products[$id];
        $price = $p['price'];
        $sub = $price * $qty;
        $subtotal += $sub;
        $order_products[] = [
            'product_id' => $id,
            'price' => $price,
            'quantity' => $qty,
            'subtotal' => $sub
        ];
    }
}
$tax_fee = round($subtotal * 0.1, 2); // 10% tax
$total = $subtotal + $tax_fee;
$now = date('Y-m-d H:i:s');
$stmt = $pdo->prepare('INSERT INTO orders (user_id, order_code, note, status, subtotal, tax_fee, total, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
$stmt->execute([$user_id, $order_code, $note, $status, $subtotal, $tax_fee, $total, $now, $now]);
$order_id = $pdo->lastInsertId();
foreach ($order_products as $op) {
    $stmt = $pdo->prepare('INSERT INTO order_details (order_id, product_id, price, quantity, subtotal) VALUES (?, ?, ?, ?, ?)');
    $stmt->execute([$order_id, $op['product_id'], $op['price'], $op['quantity'], $op['subtotal']]);
}
// Xóa giỏ hàng sau khi đặt
unset($_SESSION['cart']);
echo json_encode(['success' => true, 'message' => 'Order placed successfully!']);
