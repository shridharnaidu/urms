<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= $title ?? 'URMS Dashboard' ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
</head>
<body>

  <!-- Header -->
  <?= view('layout/header') ?>

  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <div class="col-md-3 col-lg-2 bg-light min-vh-100 p-0">
        <?= view('layout/sidebar') ?>
      </div>

      <!-- Main Content -->
      <div class="col-md-9 col-lg-10 p-4">
        <?= $this->renderSection('content') ?>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <?= view('layout/footer') ?>

  <!-- Scripts -->
  <script src="<?= base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/script.js') ?>"></script>
</body>
</html>
