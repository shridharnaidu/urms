<?php

namespace App\Models;

use CodeIgniter\Model;

class MarksModel extends Model
{
    protected $table = 'marks';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'student_id',
        'subject_id',
        'marks_obtained',
        'grade'
    ];

    protected $useTimestamps = true;
}
