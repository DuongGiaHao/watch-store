<?php
require_once '../../config/database.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = (int)$_POST['user_id'];
    $order_code = trim($_POST['order_code']);
    $note = trim($_POST['note']);
    $status = trim($_POST['status']);
    $products = $_POST['products'] ?? [];
    $subtotal = 0;
    $tax_fee = 0;
    $total = 0;
    $order_products = [];
    foreach ($products as $pid => $info) {
        if (!empty($info['checked']) && $info['qty'] > 0) {
            $stmt = $pdo->prepare('SELECT price FROM products WHERE id = ?');
            $stmt->execute([$pid]);
            $price = $stmt->fetchColumn();
            $qty = (int)$info['qty'];
            $sub = $price * $qty;
            $subtotal += $sub;
            $order_products[] = [
                'product_id' => $pid,
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
    header('Location: index.php?msg=added');
    exit;
}
header('Location: index.php?error=invalid');
