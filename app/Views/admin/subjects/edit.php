<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<h3>Edit Subject</h3>
<form action="<?= base_url('admin/subjects/update/' . $subject['id']) ?>" method="post">
  <div class="form-group">
    <label>Subject Name</label>
    <input type="text" name="name" class="form-control" value="<?= $subject['name'] ?>" required>
  </div>

  <div class="form-group mt-2">
    <label>Course</label>
    <select name="course_id" class="form-control" required>
      <?php foreach ($courses as $course): ?>
        <option value="<?= $course['id'] ?>" <?= $course['id'] == $subject['course_id'] ? 'selected' : '' ?>>
          <?= $course['name'] ?>
        </option>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="form-group mt-2">
    <label>Semester</label>
    <select name="semester_id" class="form-control" required>
      <?php foreach ($semesters as $sem): ?>
        <option value="<?= $sem['id'] ?>" <?= $sem['id'] == $subject['semester_id'] ? 'selected' : '' ?>>
          <?= $sem['name'] ?>
        </option>
      <?php endforeach; ?>
    </select>
  </div>

  <button class="btn btn-primary mt-3">Update</button>
</form>

<?= $this->endSection() ?>
