<?php

namespace App\Controllers;

use App\Models\PersonenModel;
use App\Models\TaskModel;
use App\Models\TaskartenModel;
use App\Models\SpaltenModel;

class Tasks extends BaseController
{
    public function getindex()
    {
        $taskModel = new TaskModel();
        $tasks = $taskModel->getTasksWithDetails();
        $data = [
            'tasks' => $tasks
        ];

        echo view('templates/header');
        echo view('templates/menu');
        echo view('tasks_liste', $data);
        echo view('templates/footer');
    }

    public function getPersonen()
    {
        $personenModel = new PersonenModel();
        $personen = $personenModel->getData();
        $data = [
            'personen' => $personen
        ];

        echo view('templates/header');
        echo view('templates/menu');
        echo view('personen', $data);
        echo view('templates/footer');
    }

    public function getCreate()
    {
        $taskartenModel = new TaskartenModel();
        $personenModel = new PersonenModel();
        $spaltenModel = new SpaltenModel();

        $data = [
            'taskarten' => $taskartenModel->getData(),
            'personen' => $personenModel->getData(),
            'spalten' => $spaltenModel->getData(),
        ];

        echo view('templates/header');
        echo view('templates/menu');
        echo view('tasks_create', $data);
        echo view('templates/footer');
    }

    public function postSubmit()
    {
        $rules = [
            'taskartenid' => 'required|integer',
            'personenid' => 'required|integer',
            'spaltenid' => 'required|integer',
            'tasks' => 'required|string|max_length[255]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $taskModel = new TaskModel();
        $taskId = $this->request->getPost('task_id');

        $data = [
            'personenid' => $this->request->getPost('personenid'),
            'taskartenid' => $this->request->getPost('taskartenid'),
            'spaltenid' => $this->request->getPost('spaltenid'),
            'tasks' => $this->request->getPost('tasks'),
            'erinnerungsdatum' => $this->request->getPost('erinnerungsdatum'),
            'erinnerung' => $this->request->getPost('erinnerung'),
            'notizen' => $this->request->getPost('notizen'),
        ];

        if ($taskId) {
            // Update existing task
            $taskModel->update($taskId, $data);
        } else {
            // Create new task
            $data['sortid'] = 1;
            $data['erstelldatum'] = date('Y-m-d H:i:s');
            $data['erledigt'] = 0;
            $data['geloescht'] = 0;
            $taskModel->insert($data);
        }

        return redirect()->to('/tasks');
    }

    public function getEdit($id)
    {
        $taskModel = new TaskModel();
        $task = $taskModel->find($id);

        $taskartenModel = new TaskartenModel();
        $personenModel = new PersonenModel();
        $spaltenModel = new SpaltenModel();

        $data = [
            'task' => $task,
            'taskarten' => $taskartenModel->getData(),
            'personen' => $personenModel->getData(),
            'spalten' => $spaltenModel->getData(),
        ];

        echo view('templates/header');
        echo view('templates/menu');
        echo view('tasks_create', $data);
        echo view('templates/footer');
    }

    public function postEdit($id)
    {
        $rules = [
            'taskartenid' => 'required|integer',
            'personenid' => 'required|integer',
            'spaltenid' => 'required|integer',
            'tasks' => 'required|string|max_length[255]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $taskModel = new TaskModel();
        $taskId = $this->request->getPost('task_id');

        $data = [
            'personenid' => $this->request->getPost('personenid'),
            'taskartenid' => $this->request->getPost('taskartenid'),
            'spaltenid' => $this->request->getPost('spaltenid'),
            'tasks' => $this->request->getPost('tasks'),
            'erinnerungsdatum' => $this->request->getPost('erinnerungsdatum'),
            'erinnerung' => $this->request->getPost('erinnerung'),
            'notizen' => $this->request->getPost('notizen'),
        ];

        $taskModel->update($taskId, $data);

        return redirect()->to('/tasks');
    }

    public function getDelete($id)
    {
        $taskModel = new TaskModel();
        $taskModel->delete($id);

        return redirect()->to('/tasks');
    }
}