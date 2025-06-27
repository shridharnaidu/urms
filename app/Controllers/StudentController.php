<?php

namespace App\Controllers;
use App\Models\StudentModel;
use App\Models\MarksModel;

class StudentController extends BaseController
{
    public function dashboard()
    {
        $userId = session()->get('id'); // or whatever your session user ID is

        $studentModel = new StudentModel();
        $marksModel = new MarksModel();

        $student = $studentModel
                    ->select('students.*, courses.name AS course_name, semesters.name AS semester_name')
                    ->join('courses', 'courses.id = students.course_id')
                    ->join('semesters', 'semesters.id = students.semester_id')
                    ->where('students.user_id', $userId)
                    ->first();

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
