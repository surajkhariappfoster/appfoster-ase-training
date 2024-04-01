<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    
    public function projects()
    {
        return $this->hasMany(Projects::class, 'user_id');
    }
}


