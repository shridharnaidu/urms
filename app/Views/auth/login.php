<!-- /app/Views/auth/login.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2>Login</h2>
    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>
    <form action="<?= base_url('loginAuth') ?>" method="post">
        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group mt-2">
            <label>Password:</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button class="btn btn-primary mt-3">Login</button>
    </form>
</div>
</body>
</html>
