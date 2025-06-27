<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<h3>Edit Department</h3>
<form action="<?= base_url('admin/departments/update/'.$department['id']) ?>" method="post">
  <div class="form-group">
    <label>Department Name</label>
    <input type="text" name="name" value="<?= $department['name'] ?>" class="form-control" required>
  </div>
  <button class="btn btn-primary mt-3">Update</button>
</form>

<?= $this->endSection() ?>
