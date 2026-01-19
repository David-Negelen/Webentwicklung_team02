<?php

namespace App\Models;

use CodeIgniter\Model;

class SpaltenModel extends Model
{
    protected $table = 'spalten';
    protected $primaryKey = 'id';

    protected $allowedFields = ['boardsid', 'sortid', 'spalte', 'spaltenbeschreibung'];

    public function getSpaltenWithBoardName(?int $boardsId = null): array
    {
        $builder = $this->db->table($this->table . ' s')
            ->select('s.id, s.boardsid, b.board AS board_name, s.sortid, s.spalte, s.spaltenbeschreibung')
            ->join('boards b', 'b.id = s.boardsid', 'left')
            ->orderBy('s.sortid', 'ASC');

        if ($boardsId !== null) {
            $builder->where('s.boardsid', $boardsId);
        }

        return $builder->get()->getResultArray();
    }

    public function getData(): array
    {
        return $this->findAll();
    }
}