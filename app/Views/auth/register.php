<!-- /app/Views/auth/register.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2>Register</h2>
    <?php if (isset($validation)): ?>
        <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
    <?php endif; ?>
    <form action="<?= base_url('registerSave') ?>" method="post">
        <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group mt-2">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group mt-2">
            <label>Password:</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="form-group mt-2">
            <label>Role:</label>
            <select name="role" class="form-control" required>
                <option value="admin">Admin</option>
                <option value="faculty">Faculty</option>
                <option value="student">Student</option>
            </select>
        </div>
        <button class="btn btn-success mt-3">Register</button>
    </form>
</div>
</body>
</html>
