<?php

namespace App\Controllers;

use App\Models\DepartmentModel;
use App\Models\CourseModel;
use App\Models\SubjectModel;

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

    // Similar for Courses and Subjects (structure only below)
}
