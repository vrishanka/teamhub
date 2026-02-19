<?php

namespace App\Controllers;

use Config\Database;

class DashboardController extends BaseController
{
    public function index()
    {
        if (!session()->get('user_id')) {
            return redirect()->to('/login');
        }

        $db = Database::connect();

        $builder = $db->table('team_users');
        $builder->select('teams.*');
        $builder->join('teams', 'teams.id = team_users.team_id');
        $builder->where('team_users.user_id', session()->get('user_id'));

        $teams = $builder->get()->getResult();

        return view('dashboard', ['teams' => $teams]);
    }
}

