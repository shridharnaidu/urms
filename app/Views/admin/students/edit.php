<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<h3>Edit Student</h3>

<form action="<?= base_url('admin/students/update/' . $student['id']) ?>" method="post" enctype="multipart/form-data">
  <div class="row">
    <div class="col-md-6 mb-3">
      <label>Roll Number</label>
      <input type="text" name="roll_no" class="form-control" value="<?= $student['roll_no'] ?>" required>
    </div>

    <div class="col-md-6 mb-3">
      <label>Full Name</label>
      <input type="text" name="name" class="form-control" value="<?= $student['name'] ?>" required>
    </div>

    <div class="col-md-6 mb-3">
      <label>Course</label>
      <select name="course_id" class="form-control" required>
        <?php foreach ($courses as $c): ?>
          <option value="<?= $c['id'] ?>" <?= $c['id'] == $student['course_id'] ? 'selected' : '' ?>>
            <?= $c['name'] ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="col-md-6 mb-3">
      <label>Semester</label>
      <select name="semester_id" class="form-control" required>
        <?php foreach ($semesters as $s): ?>
          <option value="<?= $s['id'] ?>" <?= $s['id'] == $student['semester_id'] ? 'selected' : '' ?>>
            <?= $s['name'] ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="col-md-6 mb-3">
      <label>Photo</label><br>
      <?php if (!empty($student['photo'])): ?>
        <img src="<?= base_url('uploads/students/' . $student['photo']) ?>" width="80" class="mb-2"><br>
      <?php endif; ?>
      <input type="file" name="photo" class="form-control">
      <input type="hidden" name="old_photo" value="<?= $student['photo'] ?>">
    </div>
  </div>

  <button class="btn btn-primary mt-2">Update Student</button>
</form>

<?= $this->endSection() ?>
