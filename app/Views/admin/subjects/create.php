<h3>Add New Subject</h3>
<form action="<?= base_url('admin/subjects/store') ?>" method="post">
    <div class="form-group">
        <label>Subject Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="form-group mt-2">
        <label>Course</label>
        <select name="course_id" class="form-control" required>
            <option value="">-- Select Course --</option>
            <?php foreach ($courses as $course): ?>
                <option value="<?= $course['id'] ?>"><?= $course['name'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group mt-2">
        <label>Semester</label>
        <select name="semester_id" class="form-control" required>
            <option value="">-- Select Semester --</option>
            <?php foreach ($semesters as $sem): ?>
                <option value="<?= $sem['id'] ?>"><?= $sem['name'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <button class="btn btn-primary mt-3">Save</button>
</form>
