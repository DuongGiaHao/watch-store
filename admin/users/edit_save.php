<?php
require_once '../../config/database.php';
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id <= 0) { header('Location: index.php?error=invalid'); exit; }
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $role = trim($_POST['role']);
    $address = trim($_POST['address']);
    $password = trim($_POST['password']);
    if ($password) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare('UPDATE users SET name = ?, email = ?, phone = ?, role = ?, address = ?, password = ? WHERE id = ?');
        $stmt->execute([$name, $email, $phone, $role, $address, $password, $id]);
    } else {
        $stmt = $pdo->prepare('UPDATE users SET name = ?, email = ?, phone = ?, role = ?, address = ? WHERE id = ?');
        $stmt->execute([$name, $email, $phone, $role, $address, $id]);
    }
    header('Location: index.php?msg=updated');
    exit;
}
header('Location: index.php?error=invalid');
