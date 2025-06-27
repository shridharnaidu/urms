<h3>Add Department</h3>
<form method="post" action="<?= base_url('admin/departments/store') ?>">
    <input type="text" name="name" placeholder="Department Name" required class="form-control">
    <br>
    <button class="btn btn-primary">Save</button>
</form>
