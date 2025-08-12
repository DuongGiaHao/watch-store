<?php
include '../admin_header.php';
require_once '../../config/database.php';

// Xử lý thông báo
$msg = $_GET['msg'] ?? '';
$error = $_GET['error'] ?? '';

// Lấy danh sách danh mục
$stmt = $pdo->query('SELECT * FROM categories ORDER BY id DESC');
$categories = $stmt->fetchAll();
?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Category Management</h1>
    <?php if ($msg === 'added'): ?>
        <div class="alert alert-success">Add category successfully!</div>
    <?php elseif ($msg === 'updated'): ?>
        <div class="alert alert-success">Update category successfully!</div>
    <?php elseif ($msg === 'deleted'): ?>
        <div class="alert alert-success">Delete category successfully!</div>
    <?php elseif ($error === 'empty'): ?>
        <div class="alert alert-danger">Category name cannot be empty!</div>
    <?php elseif ($error === 'notfound'): ?>
        <div class="alert alert-danger">Category not found!</div>
    <?php endif; ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Category List</h6>
            <a href="add_form.php" class="btn btn-success btn-sm float-right">Add Category</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($categories)): ?>
                            <tr><td colspan="3" class="text-center">No categories found.</td></tr>
                        <?php else: ?>
                            <?php foreach ($categories as $cat): ?>
                                <tr>
                                    <td><?= $cat['id'] ?></td>
                                    <td><?= htmlspecialchars($cat['name']) ?></td>
                                    <td>
                                        <a href="edit.php?id=<?= $cat['id'] ?>" class="btn btn-warning btn-sm">Sửa</a>
                                        <a href="delete.php?id=<?= $cat['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include '../admin_footer.php'; ?>
