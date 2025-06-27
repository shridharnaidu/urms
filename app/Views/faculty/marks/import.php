<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<h3>📥 Import Marks via Excel</h3>

<form action="<?= base_url('faculty/marks/importExcel') ?>" method="post" enctype="multipart/form-data">
  <div class="form-group mb-3">
    <label>Select Excel File (.xlsx)</label>
    <input type="file" name="file" class="form-control" accept=".xlsx" required>
  </div>
  <button class="btn btn-success">Upload & Import</button>
</form>

<p class="mt-4 text-muted">Required format: <strong>student_id, subject_id, marks_obtained</strong></p>

<?= $this->endSection() ?>
