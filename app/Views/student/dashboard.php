<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<h3>Welcome, <?= esc($student['name']) ?> 👋</h3>

<div class="row mt-3">
  <div class="col-md-6">
    <div class="card shadow-sm border-0">
      <div class="card-body">
        <h5 class="card-title">👤 Student Information</h5>
        <p><strong>Roll No:</strong> <?= esc($student['roll_no']) ?></p>
        <p><strong>Course:</strong> <?= esc($student['course_name']) ?></p>
        <p><strong>Semester:</strong> <?= esc($student['semester_name']) ?></p>
      </div>
    </div>
  </div>
</div>

<h4 class="mt-5">📊 Your Results</h4>

<?php if (!empty($results)): ?>
  <div class="table-responsive">
    <table class="table table-bordered table-hover mt-2">
      <thead class="table-dark">
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
            <td><?= esc($row['subject_name']) ?></td>
            <td><?= esc($row['marks_obtained']) ?></td>
            <td><?= esc($row['grade']) ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
<?php else: ?>
  <div class="alert alert-info mt-3">
    No marks found yet. Please check back later.
  </div>
<?php endif; ?>

<?= $this->endSection() ?>
