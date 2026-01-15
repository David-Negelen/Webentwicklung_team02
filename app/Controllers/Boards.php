<?php

namespace App\Controllers;

class Boards extends BaseController
{
    public function getindex()
    {
        echo view("templates/header");
        echo view("templates/menu");
        echo view('boards');
        echo view("templates/footer");
    }
}
