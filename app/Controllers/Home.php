<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('startseite');
    }

    public function spalten()
    {

        return view('spalten');
    }

    public function erstellen()
    {
        return view('erstellen');
    }
}
