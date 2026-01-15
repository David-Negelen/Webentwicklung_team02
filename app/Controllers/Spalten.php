<?php

namespace App\Controllers;

class Spalten extends BaseController
{
    public function getindex()
    {
        echo view("templates/header");
        echo view("templates/menu");
        echo view('spalten');
        echo view("templates/footer");
    }

    public function getErstellen()
    {
        echo view("templates/header");
        echo view("templates/menu");
        echo view("erstellen");
        echo view("templates/footer");
    }
}
