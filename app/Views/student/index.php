<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-8">

            <!-- 📥 Import Students -->
            <div class="card mb-4">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">Import Students from Excel</h5>
                </div>
                <div class="card-body">
                    <?php if (session()->getFlashdata('import_error')): ?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('import_error') ?></div>
                    <?php elseif (session()->getFlashdata('import_success')): ?>
                        <div class="alert alert-success"><?= session()->getFlashdata('import_success') ?></div>
                    <?php endif; ?>

                    <form action="<?= base_url('import-students') ?>" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="excel_file" class="form-label">Upload Excel File (.xlsx)</label>
                            <input type="file" name="excel_file" id="excel_file" class="form-control" accept=".xlsx" required>
                        </div>
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-upload"></i> Import Students
                        </button>
                        <a href="<?= base_url('download-student-template') ?>" class="btn btn-outline-secondary ms-2">
                            <i class="bi bi-download"></i> Download Template
                        </a>
                    </form>
                </div>
            </div>

            <!-- 📤 Export Students -->
            <div class="card">
                <div class="card-body">
                    <a href="<?= base_url('export-students') ?>" class="btn btn-primary">
                        <i class="bi bi-file-earmark-excel"></i> Export Students to Excel
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection() ?>
