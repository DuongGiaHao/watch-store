<?php
require_once '../../config/database.php';
include '../admin_header.php';
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id <= 0) { echo '<div class="container py-5"><div class="alert alert-danger">Không tìm thấy đơn hàng!</div></div>'; include '../admin_footer.php'; exit; }
$stmt = $pdo->prepare('SELECT * FROM orders WHERE id = ?');
$stmt->execute([$id]);
$order = $stmt->fetch();
if (!$order) { echo '<div class="container py-5"><div class="alert alert-danger">Không tìm thấy đơn hàng!</div></div>'; include '../admin_footer.php'; exit; }
// Lấy danh sách user
$users = $pdo->query('SELECT id, name FROM users')->fetchAll();
?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Order</h1>
    <form method="post" action="edit_save.php?id=<?= $order['id'] ?>">
        <div class="form-group mb-3">
            <label>User</label>
            <select name="user_id" class="form-control">
                <?php foreach ($users as $u): ?>
                <option value="<?= $u['id'] ?>" <?= $order['user_id'] == $u['id'] ? 'selected' : '' ?>><?= htmlspecialchars($u['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group mb-3">
            <label>Order Code</label>
            <input type="text" name="order_code" class="form-control" value="<?= htmlspecialchars($order['order_code']) ?>" required>
        </div>
        <div class="form-group mb-3">
            <label>Note</label>
            <textarea name="note" class="form-control"><?= htmlspecialchars($order['note']) ?></textarea>
        </div>
        <div class="form-group mb-3">
            <label>Status</label>
            <input type="text" name="status" class="form-control" value="<?= htmlspecialchars($order['status']) ?>">
        </div>
        <button type="submit" class="btn btn-success">Save Changes</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>
<?php include '../admin_footer.php'; ?>
