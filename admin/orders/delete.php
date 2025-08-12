<?php
require_once '../../config/database.php';
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id > 0) {
    // Xóa chi tiết đơn hàng trước
    $stmt = $pdo->prepare('DELETE FROM order_details WHERE order_id = ?');
    $stmt->execute([$id]);
    // Xóa đơn hàng
    $stmt = $pdo->prepare('DELETE FROM orders WHERE id = ?');
    $stmt->execute([$id]);
    header('Location: index.php?msg=deleted');
    exit;
}
header('Location: index.php?error=invalid');
