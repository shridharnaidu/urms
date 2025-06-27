<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<h3>Add Course</h3>
<form action="<?= base_url('admin/courses/store') ?>" method="post">
  <div class="form-group">
    <label>Course Name</label>
    <input type="text" name="name" class="form-control" required>
  </div>

  <div class="form-group mt-2">
    <label>Department</label>
    <select name="department_id" class="form-control" required>
      <option value="">Select Department</option>
      <?php foreach ($departments as $d): ?>
        <option value="<?= $d['id'] ?>"><?= $d['name'] ?></option>
      <?php endforeach; ?>
    </select>
  </div>

  <button class="btn btn-primary mt-3">Save</button>
</form>

<?= $this->endSection() ?>
