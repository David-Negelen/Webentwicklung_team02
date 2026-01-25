<?php

namespace App\Models;

use CodeIgniter\Model;

class BoardsModel extends Model
{
    protected $table = 'boards';
    protected $primaryKey = 'id';

    protected $allowedFields = ['board'];

    public function getData(): array
    {
        return $this->findAll();
    }
}
