<?php

namespace App\Controllers;

use App\Models\TestModel;
use CodeIgniter\Controller;

class Tests extends Controller
{
    protected $testModel;

    public function __construct()
    {
        $this->testModel = new TestModel();
    }

    /**
     * GET /tests
     * Atgriež visus testus
     */
    public function index()
    {
        return $this->response->setJSON(
            $this->testModel->findAll()
        );
    }

    /**
     * GET /tests/{id}
     * Atgriež vienu testu
     */
    public function show($id)
    {
        $test = $this->testModel->find($id);

        if (!$test) {
            return $this->response
                ->setStatusCode(404)
                ->setJSON(['error' => 'Tests nav atrasts']);
        }

        return $this->response->setJSON($test);
    }

    /**
     * POST /tests
     * Izveido jaunu testu
     */
    public function create()
    {
        $data = $this->request->getJSON(true);

        if (!$this->testModel->insert($data)) {
            return $this->response
                ->setStatusCode(400)
                ->setJSON($this->testModel->errors());
        }

        return $this->response
            ->setStatusCode(201)
            ->setJSON(
                $this->testModel->find(
                    $this->testModel->getInsertID()
                )
            );
    }

    /**
     * PUT /tests/{id}
     * Atjauno testu
     */
    public function update($id)
    {
        if (!$this->testModel->find($id)) {
            return $this->response
                ->setStatusCode(404)
                ->setJSON(['error' => 'Tests nav atrasts']);
        }

        $data = $this->request->getJSON(true);

        if (!$this->testModel->update($id, $data)) {
            return $this->response
                ->setStatusCode(400)
                ->setJSON($this->testModel->errors());
        }

        return $this->response->setJSON(
            $this->testModel->find($id)
        );
    }

    /**
     * DELETE /tests/{id}
     * Dzēš testu
     */
    public function delete($id)
    {
        if (!$this->testModel->find($id)) {
            return $this->response
                ->setStatusCode(404)
                ->setJSON(['error' => 'Tests nav atrasts']);
        }

        $this->testModel->delete($id);

        return $this->response->setJSON([
            'status' => 'deleted'
        ]);
    }
}
