<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'priority', 'status', 'user_id'];

    protected $table = 'todos'; // Set the custom table name


    public function user()
    {
        return $this->belongsTo(NewUser::class, 'user_id');
    }
}
