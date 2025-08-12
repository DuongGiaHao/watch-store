<?php
include '../admin_header.php';
?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Add User</h1>
    <form method="post" action="add.php">
        <div class="form-group mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label>Role</label>
            <select name="role" class="form-control">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        <div class="form-group mb-3">
            <label>Address</label>
            <input type="text" name="address" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Create User</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>
<?php include '../admin_footer.php'; ?>
