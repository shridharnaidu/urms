<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<h3>📄 Marks Entered</h3>

<?php if (session()->getFlashdata('success')): ?>
  <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>

<table class="table table-bordered table-striped mt-3">
  <thead>
    <tr>
      <th>#</th>
      <th>Student</th>
      <th>Subject</th>
      <th>Marks</th>
      <th>Grade</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($marks as $i => $m): ?>
      <tr>
        <td><?= $i + 1 ?></td>
        <td><?= $m['student_name'] ?> (<?= $m['roll_no'] ?>)</td>
        <td><?= $m['subject_name'] ?></td>
        <td><?= $m['marks_obtained'] ?></td>
        <td><?= $m['grade'] ?></td>
        <td>
          <a href="<?= base_url('faculty/marks/edit/' . $m['id']) ?>" class="btn btn-sm btn-primary">Edit</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?= $this->endSection() ?>
