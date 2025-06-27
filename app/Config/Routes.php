<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');


$routes->get('/login', 'Auth::login');
$routes->post('/loginAuth', 'Auth::loginAuth');
$routes->get('/register', 'Auth::register');
$routes->post('/registerSave', 'Auth::registerSave');
$routes->get('/logout', 'Auth::logout');

// Dashboards
$routes->get('/admin/dashboard', 'Admin::dashboard');
$routes->get('/faculty/dashboard', 'Faculty::dashboard');
$routes->get('/student/dashboard', 'Student::dashboard');

// Admin dashboard
$routes->get('admin/dashboard', 'Admin::dashboard');

// Department CRUD
$routes->get('admin/departments', 'Admin::departments');
$routes->get('admin/departments/add', 'Admin::addDepartment');
$routes->post('admin/departments/store', 'Admin::storeDepartment');
$routes->get('admin/departments/edit/(:num)', 'Admin::editDepartment/$1');
$routes->post('admin/departments/update/(:num)', 'Admin::updateDepartment/$1');
$routes->get('admin/departments/delete/(:num)', 'Admin::deleteDepartment/$1');

// Courses CRUD
$routes->get('admin/courses', 'Admin::courses');
$routes->get('admin/courses/add', 'Admin::addCourse');
$routes->post('admin/courses/store', 'Admin::storeCourse');
$routes->get('admin/courses/edit/(:num)', 'Admin::editCourse/$1');
$routes->post('admin/courses/update/(:num)', 'Admin::updateCourse/$1');
$routes->get('admin/courses/delete/(:num)', 'Admin::deleteCourse/$1');

// Subject CRUD
$routes->get('admin/subjects', 'Admin::subjects');
$routes->get('admin/subjects/add', 'Admin::addSubject');
$routes->post('admin/subjects/store', 'Admin::storeSubject');
$routes->get('admin/subjects/edit/(:num)', 'Admin::editSubject/$1');
$routes->post('admin/subjects/update/(:num)', 'Admin::updateSubject/$1');
$routes->get('admin/subjects/delete/(:num)', 'Admin::deleteSubject/$1');
