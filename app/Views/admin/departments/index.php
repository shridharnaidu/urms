<h3>Departments</h3>
<a href="<?= base_url('admin/departments/add') ?>" class="btn btn-success mb-2">Add New</a>
<table class="table">
    <tr><th>ID</th><th>Name</th><th>Actions</th></tr>
    <?php foreach ($departments as $dept): ?>
    <tr>
        <td><?= $dept['id'] ?></td>
        <td><?= $dept['name'] ?></td>
        <td>
            <a href="<?= base_url('admin/departments/edit/'.$dept['id']) ?>">Edit</a> |
            <a href="<?= base_url('admin/departments/delete/'.$dept['id']) ?>" onclick="return confirm('Delete?')">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
