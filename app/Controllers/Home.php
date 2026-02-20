<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function getindex()
    {
        echo view("templates/header");
        echo view("templates/menu");
        echo view('startseite');
        echo view("templates/footer");
    }
}


