<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<h3>Enter Student Marks</h3>

<form action="<?= base_url('faculty/marks/store') ?>" method="post">
  <div class="row">
    <div class="col-md-6 mb-3">
      <label>Subject</label>
      <select name="subject_id" class="form-control" required>
        <option value="">Select Subject</option>
        <?php foreach ($subjects as $s): ?>
          <option value="<?= $s['id'] ?>"><?= $s['name'] ?></option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="col-md-6 mb-3">
      <label>Student</label>
      <select name="student_id" class="form-control" required>
        <option value="">Select Student</option>
        <?php foreach ($students as $s): ?>
          <option value="<?= $s['id'] ?>"><?= $s['name'] ?> (<?= $s['roll_no'] ?>)</option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="col-md-6 mb-3">
      <label>Marks Obtained</label>
      <input type="number" name="marks_obtained" step="0.01" class="form-control" required>
    </div>
  </div>

  <button class="btn btn-primary">Submit Marks</button>
</form>

<?= $this->endSection() ?>
