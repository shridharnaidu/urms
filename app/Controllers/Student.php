<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\StudentModel;
use App\Models\MarksModel;
use App\Models\SubjectModel;

class Student extends BaseController
{
    public function dashboard()
    {
        $session = session();
        $studentId = $session->get('id');

        $studentModel = new StudentModel();
        $marksModel   = new MarksModel();
        $subjectModel = new SubjectModel();

        // Fetch student details with course and semester
        $student = $studentModel
            ->select('students.*, courses.name as course_name, semesters.name as semester_name')
            ->join('courses', 'courses.id = students.course_id')
            ->join('semesters', 'semesters.id = students.semester_id')
            ->where('students.id', $studentId)
            ->first();

        if (!$student) {
            return redirect()->to('/login')->with('error', 'Student not found.');
        }

        // Fetch marks
        $results = $marksModel->where('student_id', $studentId)->findAll();

        foreach ($results as &$r) {
            $subject = $subjectModel->find($r['subject_id']);
            $r['subject_name'] = $subject['name'] ?? 'N/A';
        }

        return view('student/dashboard', [
            'title'   => 'My Dashboard',
            'student' => $student,
            'results' => $results
        ]);
    }
}
