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

    public function testdb()
    {
        $db = \Config\Database::connect();
        return $db->simpleQuery('SELECT 1')
            ? 'DB-Verbindung OK'
            : 'DB-Fehler';
    }
}


