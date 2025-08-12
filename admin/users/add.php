<?php
require_once '../../config/database.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $role = trim($_POST['role']);
    $address = trim($_POST['address']);
    $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);
    $stmt = $pdo->prepare('INSERT INTO users (name, email, phone, role, address, password) VALUES (?, ?, ?, ?, ?, ?)');
    $stmt->execute([$name, $email, $phone, $role, $address, $password]);
    header('Location: index.php?msg=added');
    exit;
}
header('Location: index.php?error=invalid');
