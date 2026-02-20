<?php

namespace App\Controllers;

use App\Models\BoardsModel;
use App\Models\SpaltenModel;

class Boards extends BaseController
{
    public function getindex()
    {
        $model = new BoardsModel();
        $boards = $model->getData();

        $data = [
            'boards' => $boards,
        ];

        echo view("templates/header");
        echo view("templates/menu");
        echo view('boards', $data);
        echo view("templates/footer");
    }

    public function getCreate()
    {
        $data = [
            'board' => [
                'id' => '',
                'board' => '',
            ],
        ];

        echo view('templates/header');
        echo view('templates/menu');
        echo view('boards_erstellen', $data);
        echo view('templates/footer');
    }

    public function postSubmit()
    {
        $model = new BoardsModel();
        $id = $this->request->getPost('board_id');

        $data = [
            'board' => (string) $this->request->getPost('board'),
        ];

        if (! $this->validate('board')) {
            $viewData = [
                'board'      => array_merge(['id' => $id], $data),
                'validation' => $this->validator,
            ];

            echo view('templates/header');
            echo view('templates/menu');
            echo view('boards_erstellen', $viewData);
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

        return redirect()->to(site_url('boards'));
    }

    public function getSubmit()
    {
        return redirect()->to(site_url('boards/create'));
    }

    public function getEdit($id)
    {
        $model = new BoardsModel();
        $board = $model->find($id);

        if (!$board) {
            return redirect()->to(site_url('boards'));
        }

        $data = [
            'board' => $board,
        ];

        echo view('templates/header');
        echo view('templates/menu');
        echo view('boards_erstellen', $data);
        echo view('templates/footer');
    }

    public function getDelete($id)
    {
        $spaltenModel = new SpaltenModel();
        $spaltenCount = $spaltenModel->countByBoardId($id);

        if ($spaltenCount > 0) {
            return redirect()->back()->with('error', 'Dieses Board kann nicht gelöscht werden, da es noch Spalten enthält. Bitte löschen Sie zuerst alle Spalten.');
        }

        $model = new BoardsModel();
        $model->delete($id);

        return redirect()->to(site_url('boards'))->with('success', 'Board erfolgreich gelöscht.');
    }
}
