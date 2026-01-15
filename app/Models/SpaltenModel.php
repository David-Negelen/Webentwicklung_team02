<?php

namespace App\Models;

use CodeIgniter\Model;

class SpaltenModel extends Model
{
    protected $table = 'spalten';
    protected $primaryKey = 'id';
    protected $allowedFields = ['spalte', 'spaltenbeschreibung', 'sortid', 'boardsid'];

    public function getData()
    {
        return $this->findAll();
    }
}
