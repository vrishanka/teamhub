<?php

namespace App\Controllers;

use Config\Database;

class TaskController extends BaseController
{
    public function store()
    {
        $db = \Config\Database::connect();

        $db->table('tasks')->insert([
            'project_id' => $this->request->getPost('project_id'),
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'status' => 'todo',
            'assigned_to' => $this->request->getPost('assigned_to'),
            'due_date' => $this->request->getPost('due_date')
        ]);

        return redirect()->to('/projects/' . $this->request->getPost('project_id'));
    }


    public function updateStatus($taskId, $status)
    {
        $db = Database::connect();

        $db->table('tasks')
            ->where('id', $taskId)
            ->update(['status' => $status]);

        return redirect()->back();
    }
    public function update()
    {
        $db = \Config\Database::connect();

        $db->table('tasks')
            ->where('id', $this->request->getPost('task_id'))
            ->update([
                'title' => $this->request->getPost('title'),
                'description' => $this->request->getPost('description'),
                'assigned_to' => $this->request->getPost('assigned_to'),
                'due_date' => $this->request->getPost('due_date')
            ]);

        return redirect()->to('/projects/' . $this->request->getPost('project_id'));
    }

    public function delete($taskId)
    {
        $db = \Config\Database::connect();

        $task = $db->table('tasks')
            ->where('id', $taskId)
            ->get()
            ->getRow();

        if ($task) {
            $db->table('tasks')->delete(['id' => $taskId]);
            return redirect()->to('/projects/' . $task->project_id);
        }

        return redirect()->back();
    }

}

