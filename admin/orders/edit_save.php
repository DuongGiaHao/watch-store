<?php
require_once '../../config/database.php';
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id <= 0) { header('Location: index.php?error=invalid'); exit; }
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = (int)$_POST['user_id'];
    $order_code = trim($_POST['order_code']);
    $note = trim($_POST['note']);
    $status = trim($_POST['status']);
    $stmt = $pdo->prepare('UPDATE orders SET user_id = ?, order_code = ?, note = ?, status = ?, updated_at = NOW() WHERE id = ?');
    $stmt->execute([$user_id, $order_code, $note, $status, $id]);
    header('Location: index.php?msg=updated');
    exit;
}
header('Location: index.php?error=invalid');
