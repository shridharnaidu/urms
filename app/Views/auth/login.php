<!DOCTYPE html>
<html>
<head>
    <title>Login | URMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <style>
        .login-card {
            max-width: 400px;
            margin: auto;
            margin-top: 80px;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 12px rgba(0, 0, 0, 0.1);
            background: #fff;
        }
        body {
            background: #f5f7fa;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="login-card">
        <h3 class="text-center mb-4">🔐 Login to URMS</h3>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <form action="<?= base_url('loginAuth') ?>" method="post">
            <div class="form-group mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required placeholder="Enter your email">
            </div>

            <div class="form-group mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required placeholder="Enter your password">
            </div>

            <button class="btn btn-primary w-100">Login</button>

            <div class="mt-3 text-center">
                <a href="<?= base_url('forgot-password') ?>" class="text-decoration-none small">Forgot Password?</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>
