<?php

namespace App\Models;
use CodeIgniter\Model;

class QuestionModel extends Model
{
    protected $table = 'Question';
    protected $primaryKey = 'Id_Question';

    protected $allowedFields = [
        'Id_Test',
        'Question',
        'Answer1',
        'Answer2',
        'Answer3',
        'Answer4',
        'CorrectNr'
    ];

    protected $returnType = 'array';
}