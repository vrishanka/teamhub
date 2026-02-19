<?php

namespace App\Models;

use CodeIgniter\Model;

class TeamUserModel extends Model
{
    protected $table = 'team_users';  
    protected $primaryKey = 'id';
    protected $returnType = 'object';

    protected $allowedFields = [
        'team_id',
        'user_id'
    ];
}

