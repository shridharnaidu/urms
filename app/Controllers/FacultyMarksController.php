<?php

namespace App\Controllers;
use App\Models\MarksModel;
use App\Models\StudentModel;
use App\Models\SubjectModel;

class FacultyMarksController extends BaseController
{
    public function create()
{
    $facultyId = session()->get('id');

    // Load only subjects assigned to the logged-in faculty
    $subjectModel = new SubjectModel();
    $data['subjects'] = $subjectModel->where('faculty_id', $facultyId)->findAll();

    $data['students'] = [];

    // Optional pre-selected subject
    $subjectId = $this->request->getGet('subject');
    if ($subjectId) {
        // Get subject to find course_id & semester_id
        $subject = $subjectModel->find($subjectId);
        if ($subject) {
            $studentModel = new StudentModel();
            $data['students'] = $studentModel
                ->where('course_id', $subject['course_id'])
                ->where('semester_id', $subject['semester_id'])
                ->findAll();
        }
        $data['selected_subject'] = $subjectId;
    }

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

    public function edit($id)
    {
        $marksModel = new MarksModel();
        $mark = $marksModel->find($id);

        if (!$mark) {
            return redirect()->back()->with('error', 'Mark not found');
        }

        $studentModel = new StudentModel();
        $subjectModel = new SubjectModel();

        $student = $studentModel->find($mark['student_id']);
        $subject = $subjectModel->find($mark['subject_id']);

        return view('faculty/marks/edit', [
            'mark'    => $mark,
            'student' => $student,
            'subject' => $subject
        ]);
    }

    public function update($id)
    {
        $marksModel = new MarksModel();
        $mark = $marksModel->find($id);

        if (!$mark) {
            return redirect()->back()->with('error', 'Mark not found');
        }

        $marks = $this->request->getPost('marks_obtained');
        $grade = $this->calculateGrade($marks);

        $marksModel->update($id, [
            'marks_obtained' => $marks,
            'grade'          => $grade
        ]);

        return redirect()->to('/faculty/marks/index')->with('success', 'Marks updated successfully!');
    }

    public function index()
    {
        $facultyId = session()->get('id');

        $marksModel = new MarksModel();

        $marks = $marksModel
            ->select('marks.*, students.name as student_name, students.roll_no, subjects.name as subject_name')
            ->join('students', 'students.id = marks.student_id')
            ->join('subjects', 'subjects.id = marks.subject_id')
            ->where('subjects.faculty_id', $facultyId)
            ->orderBy('marks.id', 'DESC')
            ->findAll();

        return view('faculty/marks/index', ['marks' => $marks]);
    }


}
