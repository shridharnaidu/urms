<?php

namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'name', 
        'email', 
        'password', 
        'role', 
        'reset_token', 
        'token_expires',
        'created_at', 
        'updated_at'
    ];

    // Enable auto timestamp management
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Return as array (optional for consistency)
    protected $returnType = 'array';
}
