<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<h3>Edit Course</h3>
<form action="<?= base_url('admin/courses/update/'.$course['id']) ?>" method="post">
  <div class="form-group">
    <label>Course Name</label>
    <input type="text" name="name" value="<?= $course['name'] ?>" class="form-control" required>
  </div>

  <div class="form-group mt-2">
    <label>Department</label>
    <select name="department_id" class="form-control" required>
      <?php foreach ($departments as $d): ?>
        <option value="<?= $d['id'] ?>" <?= $d['id'] == $course['department_id'] ? 'selected' : '' ?>>
          <?= $d['name'] ?>
        </option>
      <?php endforeach; ?>
    </select>
  </div>

  <button class="btn btn-primary mt-3">Update</button>
</form>

<?= $this->endSection() ?>
