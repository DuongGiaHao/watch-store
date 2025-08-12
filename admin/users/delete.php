<?php
require_once '../../config/database.php';
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id > 0) {
    $stmt = $pdo->prepare('DELETE FROM users WHERE id = ?');
    $stmt->execute([$id]);
    header('Location: index.php?msg=deleted');
    exit;
}
header('Location: index.php?error=invalid');
