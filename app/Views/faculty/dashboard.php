<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<h3>Welcome, <?= esc(session()->get('name')) ?> 👨‍🏫</h3>

<div class="row mt-4">
  <div class="col-md-8">
    <div class="card shadow-sm border-0">
      <div class="card-header bg-primary text-white">
        <h5 class="mb-0">📚 Assigned Subjects</h5>
      </div>
      <div class="card-body">
        <?php if (empty($subjects)): ?>
          <p class="text-muted">You have not been assigned any subjects yet.</p>
        <?php else: ?>
          <ul class="list-group">
            <?php foreach ($subjects as $subject): ?>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <?= esc($subject['name']) ?>
                <a href="<?= base_url('faculty/marks/create?subject=' . $subject['id']) ?>" class="btn btn-sm btn-outline-primary">
                  Enter Marks
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>
      </div>
      <div class="card-footer text-muted text-end">
        Total Subjects: <span class="badge bg-secondary"><?= count($subjects) ?></span>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
