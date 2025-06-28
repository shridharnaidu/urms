<?php
$role = session()->get('role');
$currentUrl = current_url();
?>

<aside class="bg-dark text-white p-3" style="min-height: 100vh;">
    <h4 class="text-white mb-4">🎓 URMS</h4>

    <ul class="nav flex-column">

        <li class="nav-item mb-2">
            <a class="nav-link text-white <?= url_is("$role/dashboard") ? 'active bg-primary' : '' ?>" 
               href="<?= base_url("$role/dashboard") ?>">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>
        </li>

        <!-- === ADMIN MENU === -->
        <?php if ($role === 'admin'): ?>
            <li class="nav-item">
                <a class="nav-link text-white d-flex justify-content-between align-items-center <?= url_is('admin/departments*') || url_is('admin/courses*') || url_is('admin/semesters*') || url_is('admin/subjects*') ? 'active' : '' ?>"
                   data-bs-toggle="collapse" href="#masterData" role="button"
                   aria-expanded="<?= url_is('admin/departments*') || url_is('admin/courses*') || url_is('admin/semesters*') || url_is('admin/subjects*') ? 'true' : 'false' ?>" 
                   aria-controls="masterData">
                    <span><i class="bi bi-hdd-stack"></i> Master Data</span>
                    <i class="bi bi-chevron-down"></i>
                </a>
                <div class="collapse <?= url_is('admin/departments*') || url_is('admin/courses*') || url_is('admin/semesters*') || url_is('admin/subjects*') ? 'show' : '' ?>" id="masterData">
                    <ul class="nav flex-column ms-3">
                        <li><a class="nav-link text-white <?= url_is('admin/departments*') ? 'active bg-primary' : '' ?>" href="<?= base_url('admin/departments') ?>">Departments</a></li>
                        <li><a class="nav-link text-white <?= url_is('admin/courses*') ? 'active bg-primary' : '' ?>" href="<?= base_url('admin/courses') ?>">Courses</a></li>
                        <li><a class="nav-link text-white <?= url_is('admin/semesters*') ? 'active bg-primary' : '' ?>" href="<?= base_url('admin/semesters') ?>">Semesters</a></li>
                        <li><a class="nav-link text-white <?= url_is('admin/subjects*') ? 'active bg-primary' : '' ?>" href="<?= base_url('admin/subjects') ?>">Subjects</a></li>
                    </ul>
                </div>
            </li>

            <li class="nav-item mt-2">
                <a class="nav-link text-white <?= url_is('admin/students*') ? 'active bg-primary' : '' ?>" 
                   href="<?= base_url('admin/students') ?>">
                    <i class="bi bi-person-lines-fill"></i> Students
                </a>
            </li>
        <?php endif; ?>

        <!-- === FACULTY MENU === -->
        <?php if ($role === 'faculty'): ?>
            <li class="nav-item mt-2">
                <a class="nav-link text-white <?= url_is('faculty/marks/create') ? 'active bg-primary' : '' ?>" 
                   href="<?= base_url('faculty/marks/create') ?>">
                    <i class="bi bi-pencil-square"></i> Enter Marks
                </a>
            </li>
            <li class="nav-item mt-2">
                <a class="nav-link text-white <?= url_is('faculty/marks') ? 'active bg-primary' : '' ?>" 
                   href="<?= base_url('faculty/marks') ?>">
                    <i class="bi bi-list-ul"></i> View Marks
                </a>
            </li>
        <?php endif; ?>

        <!-- === STUDENT MENU === -->
        <?php if ($role === 'student'): ?>
            <li class="nav-item mt-2">
                <a class="nav-link text-white <?= url_is('student/dashboard') ? 'active bg-primary' : '' ?>" 
                   href="<?= base_url('student/dashboard') ?>">
                    <i class="bi bi-file-earmark-text"></i> My Results
                </a>
            </li>
        <?php endif; ?>

        <li class="nav-item mt-4">
            <a class="nav-link text-white" href="<?= base_url('logout') ?>">
                <i class="bi bi-box-arrow-right"></i> Logout
            </a>
        </li>
    </ul>
</aside>
