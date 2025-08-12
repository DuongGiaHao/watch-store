<?php
require_once '../../config/database.php';
include '../admin_header.php';
// Lấy danh sách user
$users = $pdo->query('SELECT id, name FROM users')->fetchAll();
// Lấy danh sách sản phẩm
$products = $pdo->query('SELECT id, name, price FROM products')->fetchAll();
?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Add Order</h1>
    <form method="post" action="add.php">
        <div class="form-group mb-3">
            <label>User</label>
            <select name="user_id" class="form-control">
                <?php foreach ($users as $u): ?>
                <option value="<?= $u['id'] ?>"><?= htmlspecialchars($u['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group mb-3">
            <label>Order Code</label>
            <input type="text" name="order_code" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label>Note</label>
            <textarea name="note" class="form-control"></textarea>
        </div>
        <div class="form-group mb-3">
            <label>Status</label>
            <input type="text" name="status" class="form-control" value="Pending">
        </div>
        <div class="form-group mb-3">
            <label>Products</label>
            <div id="order-products">
                <?php foreach ($products as $p): ?>
                <div class="mb-2">
                    <input type="checkbox" name="products[<?= $p['id'] ?>][checked]" value="1">
                    <?= htmlspecialchars($p['name']) ?> - $<?= number_format($p['price'], 2, ',', '.') ?>
                    Qty: <input type="number" name="products[<?= $p['id'] ?>][qty]" value="1" min="1" style="width:60px;">
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Create Order</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>
<?php include '../admin_footer.php'; ?>
