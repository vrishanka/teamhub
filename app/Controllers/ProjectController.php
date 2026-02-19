<?php

namespace App\Controllers;

use Config\Database;

class ProjectController extends BaseController
{
    public function create($teamId)
    {
        return view('projects/create', ['team_id' => $teamId]);
    }

    public function store()
    {
        $db = Database::connect();

        $db->table('projects')->insert([
            'team_id' => $this->request->getPost('team_id'),
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'created_by' => session()->get('user_id')
        ]);

        return redirect()->to('/teams/' . $this->request->getPost('team_id'));
    }

    public function show($projectId)
    {
        $db = \Config\Database::connect();

        $project = $db->table('projects')
            ->where('id', $projectId)
            ->get()
            ->getRow();

        // Get tasks
        $tasks = $db->table('tasks')
            ->where('project_id', $projectId)
            ->get()
            ->getResult();

        // Get team members
        $members = $db->table('team_users')
            ->select('users.id, users.name')
            ->join('users', 'users.id = team_users.user_id')
            ->where('team_users.team_id', $project->team_id)
            ->get()
            ->getResult();

        return view('projects/board', [
            'project' => $project,
            'tasks' => $tasks,
            'members' => $members
        ]);
    }
}

