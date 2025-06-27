<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<h3>Students</h3>
<a href="<?= base_url('admin/students/create') ?>" class="btn btn-success mb-3">Add Student</a>

<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>#</th>
      <th>Roll No</th>
      <th>Name</th>
      <th>Course</th>
      <th>Semester</th>
      <th>Photo</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($students as $s): ?>
      <tr>
        <td><?= $s['id'] ?></td>
        <td><?= $s['roll_no'] ?></td>
        <td><?= $s['name'] ?></td>
        <td><?= $s['course_name'] ?></td>
        <td><?= $s['semester_name'] ?></td>
        <td>
          <?php if ($s['photo']): ?>
            <img src="<?= base_url('uploads/students/' . $s['photo']) ?>" alt="photo" width="50">
          <?php endif; ?>
        </td>
        <td>
          <a href="<?= base_url('admin/students/edit/' . $s['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
          <a href="<?= base_url('admin/students/delete/' . $s['id']) ?>" onclick="return confirm('Delete?')" class="btn btn-danger btn-sm">Delete</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?= $this->endSection() ?>
