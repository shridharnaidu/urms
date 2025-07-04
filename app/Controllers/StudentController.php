<?php

namespace App\Controllers;

use App\Models\StudentModel;
use App\Models\MarksModel;

class StudentController extends BaseController
{
    public function dashboard()
    {
        $userId = session()->get('id');

        if (!$userId) {
            return redirect()->to('/login')->with('error', 'You must be logged in.');
        }

        $studentModel = new StudentModel();
        $marksModel   = new MarksModel();

        $student = $studentModel
            ->select('students.*, departments.name as department_name, semesters.name as semester_name')
            ->join('departments', 'departments.id = students.department_id', 'left')
            ->join('semesters', 'semesters.id = students.semester_id', 'left')
            ->join('courses', 'courses.id = students.course_id', 'left')
            ->where('students.user_id', $userId)
            ->first();

        if (!$student) {
            return redirect()->to('/logout')->with('error', 'Student record not found.');
        }

        $results = $marksModel
            ->select('marks.*, subjects.name as subject_name')
            ->join('subjects', 'subjects.id = marks.subject_id')
            ->where('marks.student_id', $student['id'])
            ->findAll();

        return view('student/dashboard', [
            'student' => $student,
            'results' => $results
        ]);
    }
}
