<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// ==================== AUTH ROUTES ====================
$routes->get('/', 'Auth::login');
$routes->get('/login', 'Auth::login');
$routes->post('/login-auth', 'Auth::loginAuth');

$routes->get('/register', 'Auth::register');
$routes->post('/register', 'Auth::registerSave');

$routes->get('/logout', 'Auth::logout');

// ==================== PASSWORD RESET ====================
$routes->get('forgot-password', 'Auth::forgotPassword');
$routes->post('forgot-password', 'Auth::handleForgotPassword');
$routes->get('reset-password/(:segment)', 'Auth::resetPassword/$1');
$routes->post('reset-password/(:segment)', 'Auth::saveNewPassword/$1');

// ==================== ADMIN ROUTES ====================
$routes->group('admin', ['filter' => 'auth:admin'], function($routes) {
    $routes->get('dashboard', 'Admin::dashboard');

    // Department CRUD
    $routes->get('departments', 'Admin::departments');
    $routes->get('departments/add', 'Admin::addDepartment');
    $routes->post('departments/store', 'Admin::storeDepartment');
    $routes->get('departments/edit/(:num)', 'Admin::editDepartment/$1');
    $routes->post('departments/update/(:num)', 'Admin::updateDepartment/$1');
    $routes->get('departments/delete/(:num)', 'Admin::deleteDepartment/$1');

    // Courses CRUD
    $routes->get('courses', 'Admin::courses');
    $routes->get('courses/add', 'Admin::addCourse');
    $routes->post('courses/store', 'Admin::storeCourse');
    $routes->get('courses/edit/(:num)', 'Admin::editCourse/$1');
    $routes->post('courses/update/(:num)', 'Admin::updateCourse/$1');
    $routes->get('courses/delete/(:num)', 'Admin::deleteCourse/$1');

    // Subjects CRUD
    $routes->get('subjects', 'Admin::subjects');
    $routes->get('subjects/add', 'Admin::addSubject');
    $routes->post('subjects/store', 'Admin::storeSubject');
    $routes->get('subjects/edit/(:num)', 'Admin::editSubject/$1');
    $routes->post('subjects/update/(:num)', 'Admin::updateSubject/$1');
    $routes->get('subjects/delete/(:num)', 'Admin::deleteSubject/$1');

    // Semesters CRUD
    $routes->get('semesters', 'Admin::semesters');
    $routes->get('semesters/add', 'Admin::addSemester');
    $routes->post('semesters/store', 'Admin::storeSemester');
    $routes->get('semesters/edit/(:num)', 'Admin::editSemester/$1');
    $routes->post('semesters/update/(:num)', 'Admin::updateSemester/$1');
    $routes->get('semesters/delete/(:num)', 'Admin::deleteSemester/$1');

    // Student Management
    $routes->group('students', function($routes) {
        $routes->get('/', 'AdminStudentController::index');
        $routes->get('create', 'AdminStudentController::create');
        $routes->post('store', 'AdminStudentController::store');
        $routes->get('edit/(:num)', 'AdminStudentController::edit/$1');
        $routes->post('update/(:num)', 'AdminStudentController::update/$1');
        $routes->get('delete/(:num)', 'AdminStudentController::delete/$1');
    });
});

// ==================== FACULTY ROUTES ====================
$routes->group('faculty', ['filter' => 'auth:faculty'], function($routes) {
    $routes->get('dashboard', 'FacultyController::dashboard'); // Match file name

    $routes->group('marks', function($routes) {
        $routes->get('create', 'FacultyMarksController::create');
        $routes->post('store', 'FacultyMarksController::store');
        $routes->get('edit/(:num)', 'FacultyMarksController::edit/$1');
        $routes->post('update/(:num)', 'FacultyMarksController::update/$1');
        $routes->get('index', 'FacultyMarksController::index');
        $routes->get('import', 'FacultyMarksController::importView');
        $routes->post('importExcel', 'FacultyMarksController::importExcel');
    });
});

// ==================== STUDENT ROUTES ====================
$routes->group('student', ['filter' => 'auth:student'], function($routes) {
    $routes->get('dashboard', 'StudentController::dashboard'); // Match file name
});

// ==================== EXCEL ====================
$routes->get('export-students', 'ExcelController::exportStudents');
$routes->post('import-students', 'ExcelController::importStudents');
$routes->get('download-student-template', 'ExcelController::downloadStudentTemplate');

// ==================== ONE-TIME SETUP ====================
$routes->get('create-admin', 'Auth::createAdmin');
