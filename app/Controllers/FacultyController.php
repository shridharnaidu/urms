<?php

namespace App\Controllers;
use App\Models\SubjectModel;

class FacultyController extends BaseController
{
    public function dashboard()
    {
        $facultyId = session()->get('id'); // Or session()->get('user_id') depending on your auth

        $subjectModel = new SubjectModel();
        $subjects = $subjectModel->where('faculty_id', $facultyId)->findAll();

        return view('faculty/dashboard', ['subjects' => $subjects]);
    }
}
