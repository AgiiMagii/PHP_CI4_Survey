<?php

namespace App\Models;

use CodeIgniter\Model;

class TestModel extends Model
{
    protected $table = 'Test';
    protected $primaryKey = 'Id_Test';

    protected $allowedFields = [
        'Name',
        'Duration',
        'Author',
        'IsActive'
    ];

    protected $useTimestamps = true;
    protected $createdField = 'CreateDate';
    protected $updatedField = null;

    protected $returnType = 'array';

    protected array $casts = [
        'IsActive' => 'boolean',
    ];

    protected $validationRules = [
        'Name'     => 'required|min_length[3]',
        'Duration' => 'required|integer|greater_than[0]',
    ];
    
}

