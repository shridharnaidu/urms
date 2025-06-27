<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\StudentModel;
use App\Models\CourseModel;
use App\Models\SemesterModel;

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
        $validation = \Config\Services::validation();
        $rules = [
            'roll_no'     => 'required|is_unique[students.roll_no]',
            'name'        => 'required',
            'course_id'   => 'required|numeric',
            'semester_id' => 'required|numeric'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $file = $this->request->getFile('photo');
        $photoName = null;
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $photoName = $file->getRandomName();
            $file->move('uploads/students/', $photoName);
        }

        $studentModel = new StudentModel();
        $studentModel->save([
            'roll_no'     => $this->request->getPost('roll_no'),
            'name'        => $this->request->getPost('name'),
            'course_id'   => $this->request->getPost('course_id'),
            'semester_id' => $this->request->getPost('semester_id'),
            'photo'       => $photoName
        ]);

        return redirect()->to('/admin/students')->with('success', 'Student added successfully!');
    }

    public function edit($id)
    {
        $studentModel = new StudentModel();
        $courseModel = new CourseModel();
        $semesterModel = new SemesterModel();

        $data['student']   = $studentModel->find($id);
        $data['courses']   = $courseModel->findAll();
        $data['semesters'] = $semesterModel->findAll();

        return view('admin/students/edit', $data);
    }

    public function update($id)
    {
        $studentModel = new StudentModel();
        $student = $studentModel->find($id);

        $rules = [
            'roll_no'     => 'required',
            'name'        => 'required',
            'course_id'   => 'required|numeric',
            'semester_id' => 'required|numeric'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $file = $this->request->getFile('photo');
        $photoName = $this->request->getPost('old_photo');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            if (!empty($photoName) && file_exists('uploads/students/' . $photoName)) {
                unlink('uploads/students/' . $photoName);
            }

            $photoName = $file->getRandomName();
            $file->move('uploads/students/', $photoName);
        }

        $studentModel->update($id, [
            'roll_no'     => $this->request->getPost('roll_no'),
            'name'        => $this->request->getPost('name'),
            'course_id'   => $this->request->getPost('course_id'),
            'semester_id' => $this->request->getPost('semester_id'),
            'photo'       => $photoName
        ]);

        return redirect()->to('/admin/students')->with('success', 'Student updated successfully!');
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
