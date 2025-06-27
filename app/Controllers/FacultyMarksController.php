<?php

namespace App\Controllers;
use App\Models\MarksModel;
use App\Models\StudentModel;
use App\Models\SubjectModel;

class FacultyMarksController extends BaseController
{
    public function create()
    {
        $subjectModel = new SubjectModel();
        $studentModel = new StudentModel();

        $data['subjects'] = $subjectModel->findAll(); // Optional: filter by faculty_id
        $data['students'] = $studentModel->findAll(); // Optional: filter by subject/course

        return view('faculty/marks/create', $data);
    }

    public function store()
    {
        $marks = $this->request->getPost('marks_obtained');
        $grade = $this->calculateGrade($marks);

        $marksModel = new MarksModel();
        $marksModel->save([
            'student_id'     => $this->request->getPost('student_id'),
            'subject_id'     => $this->request->getPost('subject_id'),
            'marks_obtained' => $marks,
            'grade'          => $grade
        ]);

        return redirect()->to('/faculty/marks/create')->with('success', 'Marks submitted!');
    }

    private function calculateGrade($marks)
    {
        if ($marks >= 90) return 'A+';
        if ($marks >= 80) return 'A';
        if ($marks >= 70) return 'B+';
        if ($marks >= 60) return 'B';
        if ($marks >= 50) return 'C';
        if ($marks >= 40) return 'D';
        return 'F';
    }
}
