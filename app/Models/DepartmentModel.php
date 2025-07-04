<?php

namespace App\Models;

use CodeIgniter\Model;

class DepartmentModel extends Model
{
    protected $table            = 'departments';
    protected $primaryKey       = 'id';

    protected $allowedFields    = [
        'name',      // Add other fields if your table has more
        'created_at',
        'updated_at'
    ];

    protected $useTimestamps = true;
}
