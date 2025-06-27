<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
    protected $table = 'students';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'roll_no',
        'name',
        'course_id',
        'semester_id',
        'photo'
    ];

    // Fetch student list with course & semester names
    public function getStudentsWithCourseSemester()
    {
        return $this->select('students.*, courses.name as course_name, semesters.name as semester_name')
                    ->join('courses', 'courses.id = students.course_id')
                    ->join('semesters', 'semesters.id = students.semester_id')
                    ->findAll();
    }
}
