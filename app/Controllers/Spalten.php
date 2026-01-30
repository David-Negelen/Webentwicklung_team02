<?php

namespace App\Controllers;

use App\Models\SpaltenModel;

class Spalten extends BaseController
{
    // Hilfsfunktion zum Laden der Boards
    private function loadBoards(): array
    {
        $db = db_connect();
        return $db->table('boards')
            ->select('id, board')
            ->orderBy('board', 'ASC')
            ->get()
            ->getResultArray();
    }

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
            'boards' => $this->loadBoards(),
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

    // Diese Methode verarbeitet SOWOHL das Erstellen ALS AUCH das Bearbeiten
    public function postSubmit()
    {
        $model = new SpaltenModel();
        $id = $this->request->getPost('spalten_id');

        // Daten aus dem Formular holen
        $data = [
            'boardsid'            => (int) $this->request->getPost('boardsid'),
            'spalte'              => (string) $this->request->getPost('spalte'),
            'spaltenbeschreibung' => (string) $this->request->getPost('spaltenbeschreibung'),
            'sortid'              => (int) $this->request->getPost('sortid'),
        ];

        // Validierung prüfen
        if (! $this->validate('spalte')) {
            $viewData = [
                'boards'     => $this->loadBoards(),
                'spalte'     => array_merge(['id' => $id], $data),
                'validation' => $this->validator,
            ];

            echo view('templates/header');
            echo view('templates/menu');
            echo view('erstellen', $viewData);
            echo view('templates/footer');
            return;
        }

        // Speichern oder Aktualisieren
        if (!empty($id)) {
            // Update
            $ok = $model->update($id, $data);
        } else {
            // Insert
            $ok = $model->insert($data);
        }

        if ($ok === false) {
            dd($this->request->getPost(), $model->errors(), $model->db->error(), $data);
        }

        return redirect()->to(site_url('spalten'));
    }

    // Fallback: if /spalten/submit is called with GET, redirect to create
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
            'boards' => $this->loadBoards(),
            'spalte' => $spalte,
        ];

        echo view('templates/header');
        echo view('templates/menu');
        echo view('erstellen', $data); // Wir nutzen die gleiche View wie bei Create
        echo view('templates/footer');
    }

    public function getDelete($id)
    {
        $model = new SpaltenModel();
        $model->delete($id);

        return redirect()->to(site_url('spalten'));
    }
}