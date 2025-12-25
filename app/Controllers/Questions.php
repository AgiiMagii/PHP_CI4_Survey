<?php

namespace App\Controllers;
use App\Models\QuestionModel;


class Questions extends BaseController
{
    protected $questionModel;

    public function __construct()
    {
        $this->questionModel = new QuestionModel();
    }
    /**
     * GET /tests/questions/{testId}
     * Atgriež visus jautājumus konkrētam testam
     */
    public function getQuestionsByTestId($testId)
    {
        $questions = $this->questionModel->where('Id_Test', $testId)->findAll();

        return $this->response->setJSON($questions);
    }
    
}