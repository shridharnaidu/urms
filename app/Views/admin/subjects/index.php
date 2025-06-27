<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<h3>Subjects</h3>
<a href="<?= base_url('admin/subjects/add') ?>" class="btn btn-success mb-2">Add Subject</a>
<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>#</th>
      <th>Subject Name</th>
      <th>Course</th>
      <th>Semester</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($subjects as $subject): ?>
      <tr>
        <td><?= $subject['id'] ?></td>
        <td><?= $subject['name'] ?></td>
        <td><?= $subject['course'] ?></td>
        <td><?= $subject['semester'] ?></td>
        <td>
          <a href="<?= base_url('admin/subjects/edit/' . $subject['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
          <a href="<?= base_url('admin/subjects/delete/' . $subject['id']) ?>" onclick="return confirm('Delete?')" class="btn btn-danger btn-sm">Delete</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?= $this->endSection() ?>
