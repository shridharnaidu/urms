<!DOCTYPE html>
<html>
<head>
  <title>Forgot Password</title>
  <link href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5" style="max-width: 500px;">
  <h4>🔑 Forgot Password</h4>
  <?php if (session()->getFlashdata('message')): ?>
    <div class="alert alert-info"><?= session()->getFlashdata('message') ?></div>
  <?php endif; ?>
  <?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
  <?php endif; ?>

  <form action="<?= base_url('forgot-password') ?>" method="post">
    <div class="form-group">
      <label>Enter your registered email</label>
      <input type="email" name="email" class="form-control" required>
    </div>
    <button class="btn btn-primary mt-3">Send Reset Link</button>
  </form>
</div>
</body>
</html>
