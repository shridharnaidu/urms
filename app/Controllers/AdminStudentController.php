<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\StudentModel;
use App\Models\CourseModel;
use App\Models\SemesterModel;
use App\Models\DepartmentModel;

class AdminStudentController extends BaseController
{
    public function index()
    {
        $studentModel = new StudentModel();
        $data['students'] = $studentModel->getStudentsWithCourseSemester();
        return view('admin/students/index', $data);
    }

    public function create()
    {
        $courseModel = new CourseModel();
        $semesterModel = new SemesterModel();

        $data['courses'] = $courseModel->findAll();
        $data['semesters'] = $semesterModel->findAll();

        return view('admin/students/create', $data);
    }

    public function store()
{
    $studentModel = new StudentModel();

    $data = [
        'roll_no'      => $this->request->getPost('roll_no'),
        'name'         => $this->request->getPost('name'),
        'department_id'=> $this->request->getPost('department_id'),
        'course_id'    => $this->request->getPost('course_id'),
        'semester_id'  => $this->request->getPost('semester_id'),
    ];

    // Optional: Handle photo upload
    $photo = $this->request->getFile('photo');
    if ($photo && $photo->isValid()) {
        $newName = $photo->getRandomName();
        $photo->move('uploads/students', $newName);
        $data['photo'] = $newName;
    }

    $studentModel->insert($data);
    return redirect()->to('admin/students')->with('success', 'Student added successfully');
}


    public function edit($id)
    {
        $studentModel = new StudentModel();
        $courseModel = new CourseModel();
        $semesterModel = new SemesterModel();
        $departmentModel = new DepartmentModel();

        $data['student']   = $studentModel->find($id);
        $data['courses']   = $courseModel->findAll();
        $data['semesters'] = $semesterModel->findAll();
        $data['departments'] = $departmentModel->findAll();

        return view('admin/students/edit', $data);
    }

    public function update($id)
{
    $studentModel = new StudentModel();

    $data = [
        'roll_no'      => $this->request->getPost('roll_no'),
        'name'         => $this->request->getPost('name'),
        'department_id'=> $this->request->getPost('department_id'),
        'course_id'    => $this->request->getPost('course_id'),
        'semester_id'  => $this->request->getPost('semester_id'),
    ];

    $photo = $this->request->getFile('photo');
    if ($photo && $photo->isValid()) {
        $newName = $photo->getRandomName();
        $photo->move('uploads/students', $newName);
        $data['photo'] = $newName;
    }

    $studentModel->update($id, $data);
    return redirect()->to('admin/students')->with('success', 'Student updated successfully');
}


    public function delete($id)
    {
        $studentModel = new StudentModel();
        $student = $studentModel->find($id);

        if ($student && $student['photo'] && file_exists('uploads/students/' . $student['photo'])) {
            unlink('uploads/students/' . $student['photo']);
        }

        $studentModel->delete($id);
        return redirect()->to('/admin/students')->with('success', 'Student deleted!');
    }
}
