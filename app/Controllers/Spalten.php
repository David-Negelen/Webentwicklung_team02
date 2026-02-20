<?php

namespace App\Controllers;

use App\Models\SpaltenModel;
use App\Models\BoardsModel;
use App\Models\TaskModel;

class Spalten extends BaseController
{

    public function getindex()
    {
        $model = new SpaltenModel();
        $spalten = $model->getSpaltenWithBoardName();

        $data = [
            'spalten' => $spalten,
        ];

        echo view('templates/header');
        echo view('templates/menu');
        echo view('spalten', $data);
        echo view('templates/footer');
    }

    public function getCreate()
    {
        $data = [
            'boards' => (new BoardsModel())->orderBy('board', 'ASC')->findAll(),
            'spalte' => [
                'id' => '',
                'boardsid' => '',
                'spalte' => '',
                'spaltenbeschreibung' => '',
                'sortid' => '',
            ],
        ];

        echo view('templates/header');
        echo view('templates/menu');
        echo view('erstellen', $data);
        echo view('templates/footer');
    }


    public function postSubmit()
    {
        $model = new SpaltenModel();
        $id = $this->request->getPost('spalten_id');

        $data = [
            'boardsid'            => (int) $this->request->getPost('boardsid'),
            'spalte'              => (string) $this->request->getPost('spalte'),
            'spaltenbeschreibung' => (string) $this->request->getPost('spaltenbeschreibung'),
            'sortid'              => (int) $this->request->getPost('sortid'),
        ];

        if (! $this->validate('spalte')) {
            $viewData = [
                'boards'     => (new BoardsModel())->orderBy('board', 'ASC')->findAll(),
                'spalte'     => array_merge(['id' => $id], $data),
                'validation' => $this->validator,
            ];

            echo view('templates/header');
            echo view('templates/menu');
            echo view('erstellen', $viewData);
            echo view('templates/footer');
            return;
        }

        if (!empty($id)) {
            $ok = $model->update($id, $data);
        } else {
            $ok = $model->insert($data);
        }

        if ($ok === false) {
            dd($this->request->getPost(), $model->errors(), $model->db->error(), $data);
        }

        return redirect()->to(site_url('spalten'));
    }

    public function getSubmit()
    {
        return redirect()->to(site_url('spalten/create'));
    }

    public function getEdit($id)
    {
        $model = new SpaltenModel();
        $spalte = $model->find($id);

        if (!$spalte) {
            return redirect()->to(site_url('spalten'));
        }

        $data = [
            'boards' => (new BoardsModel())->orderBy('board', 'ASC')->findAll(),
            'spalte' => $spalte,
        ];

        echo view('templates/header');
        echo view('templates/menu');
        echo view('erstellen', $data);
        echo view('templates/footer');
    }

    public function getDelete($id)
    {
        $taskModel = new TaskModel();
        $tasksCount = $taskModel->countBySpaltenId($id);

        if ($tasksCount > 0) {
            return redirect()->back()->with('error', 'Diese Spalte kann nicht gelöscht werden, da sie noch Tasks enthält. Bitte löschen Sie zuerst alle Tasks.');
        }

        $model = new SpaltenModel();
        $model->delete($id);

        return redirect()->to(site_url('spalten'))->with('success', 'Spalte erfolgreich gelöscht.');
    }
}