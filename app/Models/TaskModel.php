<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table = 'tasks';
    protected $primaryKey = 'id';
    protected $allowedFields = ['personenid', 'taskartenid', 'spaltenid', 'sortid', 'tasks', 'erstelldatum', 'erinnerungsdatum', 'erinnerung', 'notizen', 'erledigt', 'geloescht'];

    public function getTasksWithDetails()
    {
        return $this->select('tasks.id, 
                      tasks.tasks as tasktitel, 
                      tasks.notizen, 
                      tasks.erstelldatum,
                      tasks.erinnerungsdatum,
                      tasks.erinnerung,
                      tasks.erledigt,
                      tasks.sortid as task_sortid,
                      spalten.spalte as spaltenname, 
                      spalten.spaltenbeschreibung, 
                      spalten.sortid as spalten_sortid,
                      boards.board as boardname,
                      personen.vorname, 
                      personen.name as nachname, 
                      personen.email,
                      taskarten.taskart as taskartname,
                      taskarten.taskartenicon')
            ->join('spalten', 'spalten.id = tasks.spaltenid')
            ->join('boards', 'boards.id = spalten.boardsid')
            ->join('personen', 'personen.id = tasks.personenid')
            ->join('taskarten', 'taskarten.id = tasks.taskartenid')
            ->orderBy('tasks.tasks', 'ASC')
            ->findAll();
    }

    public function getAllTasksSorted()
    {
        return $this->orderBy('tasks', 'ASC')->findAll();
    }
}
