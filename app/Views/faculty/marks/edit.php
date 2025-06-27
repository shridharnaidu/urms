<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<h3>Edit Marks for <?= $student['name'] ?> (<?= $student['roll_no'] ?>)</h3>

<form action="<?= base_url('faculty/marks/update/' . $mark['id']) ?>" method="post">
  <div class="row">
    <div class="col-md-6 mb-3">
      <label>Subject</label>
      <input type="text" class="form-control" value="<?= $subject['name'] ?>" readonly>
    </div>

    <div class="col-md-6 mb-3">
      <label>Marks Obtained</label>
      <input type="number" name="marks_obtained" step="0.01" class="form-control" required value="<?= $mark['marks_obtained'] ?>">
    </div>
  </div>

  <button class="btn btn-primary">Update Marks</button>
</form>

<?= $this->endSection() ?>
