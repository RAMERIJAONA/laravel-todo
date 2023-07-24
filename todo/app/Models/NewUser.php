<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewUser extends Model
{
    protected $fillable = [
        'email', 'first_name', 'last_name', 'password',
    ];

    protected $table = 'new_users'; 
    
    public function todos()
    {
        return $this->hasMany(Todo::class, 'user_id');
    }
}

