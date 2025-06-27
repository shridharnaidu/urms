<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<h3>Add Semester</h3>
<form action="<?= base_url('admin/semesters/store') ?>" method="post">
  <div class="form-group">
    <label>Semester Name</label>
    <input type="text" name="name" class="form-control" required>
  </div>

  <div class="form-group mt-2">
    <label>Course</label>
    <select name="course_id" class="form-control" required>
      <option value="">Select Course</option>
      <?php foreach ($courses as $c): ?>
        <option value="<?= $c['id'] ?>"><?= $c['name'] ?></option>
      <?php endforeach; ?>
    </select>
  </div>

  <button class="btn btn-primary mt-3">Save</button>
</form>

<?= $this->endSection() ?>
