<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<h3>Add Department</h3>
<form action="<?= base_url('admin/departments/store') ?>" method="post">
  <div class="form-group">
    <label>Department Name</label>
    <input type="text" name="name" class="form-control" required>
  </div>
  <button class="btn btn-primary mt-3">Save</button>
</form>

<?= $this->endSection() ?>
