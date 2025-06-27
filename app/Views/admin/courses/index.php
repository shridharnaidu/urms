<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<h3>Courses</h3>
<a href="<?= base_url('admin/courses/add') ?>" class="btn btn-success mb-2">Add Course</a>
<table class="table table-bordered table-striped">
  <thead>
    <tr><th>#</th><th>Name</th><th>Department</th><th>Actions</th></tr>
  </thead>
  <tbody>
    <?php foreach ($courses as $c): ?>
      <tr>
        <td><?= $c['id'] ?></td>
        <td><?= $c['name'] ?></td>
        <td><?= $c['department'] ?></td>
        <td>
          <a href="<?= base_url('admin/courses/edit/'.$c['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
          <a href="<?= base_url('admin/courses/delete/'.$c['id']) ?>" onclick="return confirm('Delete?')" class="btn btn-danger btn-sm">Delete</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?= $this->endSection() ?>
