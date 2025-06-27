<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<h3>Edit Semester</h3>
<form action="<?= base_url('admin/semesters/update/' . $semester['id']) ?>" method="post">
  <div class="form-group">
    <label>Semester Name</label>
    <input type="text" name="name" value="<?= $semester['name'] ?>" class="form-control" required>
  </div>

  <div class="form-group mt-2">
    <label>Course</label>
    <select name="course_id" class="form-control" required>
      <?php foreach ($courses as $c): ?>
        <option value="<?= $c['id'] ?>" <?= $c['id'] == $semester['course_id'] ? 'selected' : '' ?>>
          <?= $c['name'] ?>
        </option>
      <?php endforeach; ?>
    </select>
  </div>

  <button class="btn btn-primary mt-3">Update</button>
</form>

<?= $this->endSection() ?>
