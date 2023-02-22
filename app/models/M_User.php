<?php

namespace App\Models;

use App\Core\Model;

class M_User extends Model
{
    public function __construct()
    {
        parent::__construct('client');
    }
}
