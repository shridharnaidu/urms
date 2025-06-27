<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<h2 class="mb-4">Welcome to URMS Admin Dashboard</h2>

<div class="row g-4">
  <!-- Quick Stats -->
  <div class="col-md-3">
    <div class="card border-start border-primary shadow-sm h-100">
      <div class="card-body">
        <h6 class="card-title">Departments</h6>
        <h2 class="fw-bold"><?= $departmentCount ?? 0 ?></h2>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card border-start border-success shadow-sm h-100">
      <div class="card-body">
        <h6 class="card-title">Courses</h6>
        <h2 class="fw-bold"><?= $courseCount ?? 0 ?></h2>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card border-start border-warning shadow-sm h-100">
      <div class="card-body">
        <h6 class="card-title">Semesters</h6>
        <h2 class="fw-bold"><?= $semesterCount ?? 0 ?></h2>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card border-start border-danger shadow-sm h-100">
      <div class="card-body">
        <h6 class="card-title">Subjects</h6>
        <h2 class="fw-bold"><?= $subjectCount ?? 0 ?></h2>
      </div>
    </div>
  </div>
</div>

<!-- Placeholder for Chart (Optional - Coming Soon) -->
<div class="row mt-5">
  <div class="col-md-12">
    <div class="card shadow-sm">
      <div class="card-body">
        <h5 class="card-title">Performance Overview</h5>
        <div style="height: 250px;" class="d-flex align-items-center justify-content-center text-muted">
          [ Chart.js graph here in future ]
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
