<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <link href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5" style="max-width: 500px;">
    <h4 class="mb-3">🔐 Reset Your Password</h4>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <?php if (isset($validation)): ?>
        <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
    <?php endif; ?>

    <form action="<?= base_url('reset-password/' . $token) ?>" method="post">
        <div class="form-group mb-3">
            <label>New Password</label>
            <input type="password" name="password" class="form-control" required placeholder="Enter new password">
        </div>

        <button type="submit" class="btn btn-primary w-100">Reset Password</button>
    </form>
</div>
</body>
</html>
