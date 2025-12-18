<?php

namespace App\Controllers;

use App\Models\PersonenModel;

class Tasks extends BaseController
{
    public function index()
    {
        $personenModel = new \App\Models\PersonenModel();
        $personen = $personenModel->getData();

        $data = [
            'personen' => $personen
        ];

        echo view('templates/header');
        echo view('templates/menu');
        echo view('personen', $data);
        echo view('templates/footer');
    }
}