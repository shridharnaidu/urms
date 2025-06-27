<h3>Edit Department</h3>
<form method="post" action="<?= base_url('admin/departments/update/'.$department['id']) ?>">
    <input type="text" name="name" value="<?= $department['name'] ?>" required class="form-control">
    <br>
    <button class="btn btn-primary">Update</button>
</form>
