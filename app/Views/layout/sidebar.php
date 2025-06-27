<div class="list-group list-group-flush">
  <a href="<?= base_url('admin/dashboard') ?>" class="list-group-item list-group-item-action <?= uri_string() == 'admin/dashboard' ? 'active' : '' ?>">Dashboard</a>

  <a href="<?= base_url('admin/departments') ?>" class="list-group-item list-group-item-action <?= uri_string() == 'admin/departments' ? 'active' : '' ?>">Departments</a>

  <a href="<?= base_url('admin/courses') ?>" class="list-group-item list-group-item-action <?= uri_string() == 'admin/courses' ? 'active' : '' ?>">Courses</a>

  <a href="<?= base_url('admin/semesters') ?>" class="list-group-item list-group-item-action <?= uri_string() == 'admin/semesters' ? 'active' : '' ?>">Semesters</a>

  <a href="<?= base_url('admin/subjects') ?>" class="list-group-item list-group-item-action <?= uri_string() == 'admin/subjects' ? 'active' : '' ?>">Subjects</a>

  <!-- More links as modules are added -->
</div>
