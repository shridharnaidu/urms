<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<h3>Welcome, <?= session()->get('name') ?> 👨‍🏫</h3>

<div class="row mt-3">
  <div class="col-md-6">
    <div class="card shadow-sm">
      <div class="card-body">
        <h5 class="card-title">Assigned Subjects</h5>
        <ul class="list-group">
          <?php foreach ($subjects as $subject): ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <?= $subject['name'] ?>
              <a href="<?= base_url('faculty/marks/create?subject=' . $subject['id']) ?>" class="btn btn-sm btn-outline-primary">Enter Marks</a>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
