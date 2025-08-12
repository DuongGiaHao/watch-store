<?php
require_once '../../config/database.php';
include '../admin_header.php';
$users = $pdo->query('SELECT * FROM users ORDER BY id DESC')->fetchAll();
?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">User Management</h1>
    <a href="add_form.php" class="btn btn-success btn-sm mb-3">Add User</a>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">User List</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $u): ?>
                        <tr>
                            <td><?= $u['id'] ?></td>
                            <td><?= htmlspecialchars($u['name']) ?></td>
                            <td><?= htmlspecialchars($u['email']) ?></td>
                            <td><?= htmlspecialchars($u['phone']) ?></td>
                            <td><?= htmlspecialchars($u['role']) ?></td>
                            <td>
                                <a href="edit.php?id=<?= $u['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="delete.php?id=<?= $u['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa user này?')">Delete</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include '../admin_footer.php'; ?>
