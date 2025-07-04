<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<h3>Add Student</h3>
<form action="<?= base_url('admin/students/store') ?>" method="post" enctype="multipart/form-data">
  <div class="row">
  <div class="col-md-6 mb-3">
    <label>Roll Number</label>
    <input type="text" name="roll_no" class="form-control" required>
  </div>

  <div class="col-md-6 mb-3">
    <label>Full Name</label>
    <input type="text" name="name" class="form-control" required>
  </div>

  <div class="col-md-6 mb-3">
    <label>Department</label>
    <select name="department_id" class="form-control" required>
      <option value="">Select Department</option>
      <?php foreach ($departments as $d): ?>
        <option value="<?= $d['id'] ?>"><?= esc($d['name']) ?></option>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="col-md-6 mb-3">
    <label>Course</label>
    <select name="course_id" class="form-control" required>
      <option value="">Select Course</option>
      <?php foreach ($courses as $c): ?>
        <option value="<?= $c['id'] ?>"><?= $c['name'] ?></option>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="col-md-6 mb-3">
    <label>Semester</label>
    <select name="semester_id" class="form-control" required>
      <option value="">Select Semester</option>
      <?php foreach ($semesters as $s): ?>
        <option value="<?= $s['id'] ?>"><?= $s['name'] ?></option>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="col-md-6 mb-3">
    <label>Upload Photo</label>
    <input type="file" name="photo" class="form-control">
  </div>
</div>


  <button class="btn btn-primary mt-2">Submit</button>
</form>

<?= $this->endSection() ?>
