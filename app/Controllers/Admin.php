<?php

namespace App\Controllers;

use App\Models\DepartmentModel;
use App\Models\CourseModel;
use App\Models\SubjectModel;
use App\Models\SemesterModel;


class Admin extends BaseController
{
    public function dashboard()
    {
        return view('admin/dashboard');
    }

    // === DEPARTMENTS ===
    public function departments()
    {
        $model = new DepartmentModel();
        $data['departments'] = $model->findAll();
        return view('admin/departments/index', $data);
    }

    public function addDepartment()
    {
        return view('admin/departments/create');
    }

    public function storeDepartment()
    {
        $model = new DepartmentModel();
        $model->save(['name' => $this->request->getPost('name')]);
        return redirect()->to('/admin/departments');
    }

    public function editDepartment($id)
    {
        $model = new DepartmentModel();
        $data['department'] = $model->find($id);
        return view('admin/departments/edit', $data);
    }

    public function updateDepartment($id)
    {
        $model = new DepartmentModel();
        $model->update($id, ['name' => $this->request->getPost('name')]);
        return redirect()->to('/admin/departments');
    }

    public function deleteDepartment($id)
    {
        $model = new DepartmentModel();
        $model->delete($id);
        return redirect()->to('/admin/departments');
    }

    // === COURSES ===
    public function courses()
    {
        $model = new CourseModel();
        $data['courses'] = $model->select('courses.*, departments.name as department')
                                 ->join('departments', 'departments.id = courses.department_id')
                                 ->findAll();
        return view('admin/courses/index', $data);
    }

    public function addCourse()
    {
        $deptModel = new DepartmentModel();
        $data['departments'] = $deptModel->findAll();
        return view('admin/courses/create', $data);
    }

    public function storeCourse()
    {
        $model = new CourseModel();
        $model->save([
            'name' => $this->request->getPost('name'),
            'department_id' => $this->request->getPost('department_id')
        ]);
        return redirect()->to('/admin/courses');
    }

    public function editCourse($id)
    {
        $model = new CourseModel();
        $deptModel = new DepartmentModel();

        $data['course'] = $model->find($id);
        $data['departments'] = $deptModel->findAll();

        return view('admin/courses/edit', $data);
    }

    public function updateCourse($id)
    {
        $model = new CourseModel();
        $model->update($id, [
            'name' => $this->request->getPost('name'),
            'department_id' => $this->request->getPost('department_id')
        ]);
        return redirect()->to('/admin/courses');
    }

    public function deleteCourse($id)
    {
        $model = new CourseModel();
        $model->delete($id);
        return redirect()->to('/admin/courses');
    }

    // === SUBJECTS ===
    public function subjects()
    {
        $model = new SubjectModel();
        $data['subjects'] = $model
            ->select('subjects.*, courses.name as course, semesters.name as semester')
            ->join('courses', 'courses.id = subjects.course_id')
            ->join('semesters', 'semesters.id = subjects.semester_id')
            ->findAll();

        return view('admin/subjects/index', $data);
    }

    public function addSubject()
    {
        $courseModel = new CourseModel();
        $semesterModel = new SemesterModel();

        $data['courses'] = $courseModel->findAll();
        $data['semesters'] = $semesterModel->findAll();

        return view('admin/subjects/create', $data);
    }

    public function storeSubject()
    {
        $model = new SubjectModel();
        $model->save([
            'name' => $this->request->getPost('name'),
            'course_id' => $this->request->getPost('course_id'),
            'semester_id' => $this->request->getPost('semester_id')
        ]);
        return redirect()->to('/admin/subjects');
    }

    public function editSubject($id)
    {
        $model = new SubjectModel();
        $courseModel = new CourseModel();
        $semesterModel = new SemesterModel();

        $data['subject'] = $model->find($id);
        $data['courses'] = $courseModel->findAll();
        $data['semesters'] = $semesterModel->findAll();

        return view('admin/subjects/edit', $data);
    }

    public function updateSubject($id)
    {
        $model = new SubjectModel();
        $model->update($id, [
            'name' => $this->request->getPost('name'),
            'course_id' => $this->request->getPost('course_id'),
            'semester_id' => $this->request->getPost('semester_id')
        ]);
        return redirect()->to('/admin/subjects');
    }

    public function deleteSubject($id)
    {
        $model = new SubjectModel();
        $model->delete($id);
        return redirect()->to('/admin/subjects');
    }

    // === SEMESTERS ===
    public function semesters()
    {
        $model = new SemesterModel();
        $data['semesters'] = $model
            ->select('semesters.*, courses.name as course')
            ->join('courses', 'courses.id = semesters.course_id')
            ->findAll();

        return view('admin/semesters/index', $data);
    }

    public function addSemester()
    {
        $courseModel = new CourseModel();
        $data['courses'] = $courseModel->findAll();
        return view('admin/semesters/create', $data);
    }

    public function storeSemester()
    {
        $model = new SemesterModel();
        $model->save([
            'name' => $this->request->getPost('name'),
            'course_id' => $this->request->getPost('course_id')
        ]);
        return redirect()->to('/admin/semesters');
    }

    public function editSemester($id)
    {
        $model = new SemesterModel();
        $courseModel = new CourseModel();

        $data['semester'] = $model->find($id);
        $data['courses'] = $courseModel->findAll();

        return view('admin/semesters/edit', $data);
    }

    public function updateSemester($id)
    {
        $model = new SemesterModel();
        $model->update($id, [
            'name' => $this->request->getPost('name'),
            'course_id' => $this->request->getPost('course_id')
        ]);
        return redirect()->to('/admin/semesters');
    }

    public function deleteSemester($id)
    {
        $model = new SemesterModel();
        $model->delete($id);
        return redirect()->to('/admin/semesters');
    }

}
