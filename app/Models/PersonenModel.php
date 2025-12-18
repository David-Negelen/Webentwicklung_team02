<?php

namespace App\Models;

use CodeIgniter\Model;

class PersonenModel extends Model
{
    protected $table = 'personen';

    public function getData()
    {
        return $this->findAll();
    }
}