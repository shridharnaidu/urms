<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<h3>Departments</h3>
<a href="<?= base_url('admin/departments/add') ?>" class="btn btn-success mb-2">Add Department</a>
<table class="table table-bordered table-striped">
  <thead>
    <tr><th>#</th><th>Name</th><th>Actions</th></tr>
  </thead>
  <tbody>
    <?php foreach ($departments as $d): ?>
      <tr>
        <td><?= $d['id'] ?></td>
        <td><?= $d['name'] ?></td>
        <td>
          <a href="<?= base_url('admin/departments/edit/'.$d['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
          <a href="<?= base_url('admin/departments/delete/'.$d['id']) ?>" onclick="return confirm('Delete?')" class="btn btn-danger btn-sm">Delete</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?= $this->endSection() ?>
