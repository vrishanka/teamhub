<?php

namespace App\Models;

use CodeIgniter\Model;

class ProjectModel extends Model
{
    protected $table = 'projects';
    protected $primaryKey = 'id';
    protected $returnType = 'object';

    protected $allowedFields = [
        'team_id',
        'name',
        'description'
    ];
}

