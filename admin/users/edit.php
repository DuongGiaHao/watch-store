<?php
require_once '../../config/database.php';
include '../admin_header.php';
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id <= 0) { echo '<div class="container py-5"><div class="alert alert-danger">Không tìm thấy user!</div></div>'; include '../admin_footer.php'; exit; }
$stmt = $pdo->prepare('SELECT * FROM users WHERE id = ?');
$stmt->execute([$id]);
$user = $stmt->fetch();
if (!$user) { echo '<div class="container py-5"><div class="alert alert-danger">Không tìm thấy user!</div></div>'; include '../admin_footer.php'; exit; }
?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit User</h1>
    <form method="post" action="edit_save.php?id=<?= $user['id'] ?>">
        <div class="form-group mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($user['name']) ?>" required>
        </div>
        <div class="form-group mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($user['email']) ?>" required>
        </div>
        <div class="form-group mb-3">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" value="<?= htmlspecialchars($user['phone']) ?>" required>
        </div>
        <div class="form-group mb-3">
            <label>Role</label>
            <select name="role" class="form-control">
                <option value="user" <?= $user['role'] == 'user' ? 'selected' : '' ?>>User</option>
                <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
            </select>
        </div>
        <div class="form-group mb-3">
            <label>Address</label>
            <input type="text" name="address" class="form-control" value="<?= htmlspecialchars($user['address']) ?>">
        </div>
        <div class="form-group mb-3">
            <label>New Password (leave blank to keep current)</label>
            <input type="password" name="password" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Save Changes</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>
<?php include '../admin_footer.php'; ?>
