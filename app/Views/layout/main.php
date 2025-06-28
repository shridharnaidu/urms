<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= $title ?? 'URMS Dashboard' ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet"> <!-- Bootstrap Icons -->
</head>
<body>

  <!-- Header -->
  <?= view('layout/header') ?>

  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <div class="col-md-3 col-lg-2 bg-dark text-white p-0">
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
