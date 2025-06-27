<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<h3>Welcome, <?= $student['name'] ?> 👋</h3>

<div class="row mt-3">
  <div class="col-md-6">
    <div class="card shadow-sm">
      <div class="card-body">
        <h5 class="card-title">Student Info</h5>
        <p><strong>Roll No:</strong> <?= $student['roll_no'] ?></p>
        <p><strong>Course:</strong> <?= $student['course_name'] ?></p>
        <p><strong>Semester:</strong> <?= $student['semester_name'] ?></p>
      </div>
    </div>
  </div>
</div>

<h4 class="mt-5">📊 Your Results</h4>

<table class="table table-bordered table-striped mt-2">
  <thead>
    <tr>
      <th>#</th>
      <th>Subject</th>
      <th>Marks</th>
      <th>Grade</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($results as $i => $row): ?>
      <tr>
        <td><?= $i + 1 ?></td>
        <td><?= $row['subject_name'] ?></td>
        <td><?= $row['marks_obtained'] ?></td>
        <td><?= $row['grade'] ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?= $this->endSection() ?>
