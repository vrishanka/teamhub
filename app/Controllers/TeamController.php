<?php

namespace App\Controllers;

use Config\Database;
use App\Models\ProjectModel;
use App\Models\TeamUserModel;


class TeamController extends BaseController
{
    public function create()
    {
        return view('teams/create');
    }

    public function store()
    {
        $db = Database::connect();

        $teamData = [
            'name' => $this->request->getPost('name'),
            'created_by' => session()->get('user_id')
        ];

        $db->table('teams')->insert($teamData);
        $teamId = $db->insertID();

        // Add creator to team_users as owner
        $db->table('team_users')->insert([
            'team_id' => $teamId,
            'user_id' => session()->get('user_id'),
            'role' => 'owner'
        ]);

        return redirect()->to('/dashboard');
    }

    public function show($id)
    {
        $projectModel = new ProjectModel();
        $teamUserModel = new TeamUserModel();

        $projects = $projectModel->where('team_id', $id)->findAll();

        $members = $teamUserModel
            ->join('users', 'users.id = team_users.user_id')
            ->where('team_users.team_id', $id)
            ->findAll();

        return view('teams/show', [
            'projects' => $projects,
            'team_id' => $id,
            'members' => $members
        ]);
    }




    public function invite()
    {
        $email = $this->request->getPost('email');
        $teamId = $this->request->getPost('team_id');

        $userModel = new UserModel();
        $teamUserModel = new TeamUserModel();

        $user = $userModel->where('email', $email)->first();

        if($user) {
            $teamUserModel->insert([
                'team_id' => $teamId,
                'user_id' => $user['id']
            ]);
            return redirect()->back()->with('success', 'User added to team');
        }

        return redirect()->back()->with('success', 'Invite email sent (mock)');
    }
    public function view($id)
    {
        $teamModel = new TeamModel();
        $teamUserModel = new TeamUserModel();
        $userModel = new UserModel();

        $team = $teamModel->find($id);

        $members = $teamUserModel
            ->select('users.*')
            ->join('users', 'users.id = team_users.user_id')
            ->where('team_users.team_id', $id)
            ->findAll();

        return view('teams/view', compact('team', 'members'));
    }

}

