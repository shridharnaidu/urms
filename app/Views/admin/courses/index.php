<h3>Courses</h3>
<a href="<?= base_url('admin/courses/add') ?>" class="btn btn-success mb-2">Add New</a>
<table class="table">
    <thead>
        <tr><th>ID</th><th>Name</th><th>Department</th><th>Actions</th></tr>
    </thead>
    <tbody>
        <?php foreach ($courses as $c): ?>
        <tr>
            <td><?= $c['id'] ?></td>
            <td><?= $c['name'] ?></td>
            <td><?= $c['department'] ?></td>
            <td>
                <a href="<?= base_url('admin/courses/edit/'.$c['id']) ?>">Edit</a> |
                <a href="<?= base_url('admin/courses/delete/'.$c['id']) ?>" onclick="return confirm('Delete this course?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
