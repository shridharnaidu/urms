<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<h3>Semesters</h3>
<a href="<?= base_url('admin/semesters/add') ?>" class="btn btn-success mb-2">Add Semester</a>
<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>#</th>
      <th>Semester</th>
      <th>Course</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($semesters as $s): ?>
      <tr>
        <td><?= $s['id'] ?></td>
        <td><?= $s['name'] ?></td>
        <td><?= $s['course'] ?></td>
        <td>
          <a href="<?= base_url('admin/semesters/edit/' . $s['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
          <a href="<?= base_url('admin/semesters/delete/' . $s['id']) ?>" onclick="return confirm('Delete?')" class="btn btn-danger btn-sm">Delete</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?= $this->endSection() ?>
