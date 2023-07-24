<?php

namespace App\Models;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens; // Add this line
use Illuminate\Notifications\Notifiable; // Add this line

class NewUser extends Model implements Authenticatable
{

    use Notifiable;
    use HasApiTokens; // Add this line
    // Implement getRememberToken method
    public function getRememberToken()
    {
        return $this->remember_token;
    }

    // Implement setRememberToken method
    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    // Implement getRememberTokenName method
    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    // Implement getAuthIdentifierName method
    public function getAuthIdentifierName()
    {
        return 'id';
    }

    // Implement getAuthIdentifier method
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    // Implement getAuthPassword method
    public function getAuthPassword()
    {
        return $this->password;
    }

    protected $fillable = [
        'email', 'first_name', 'last_name', 'password',
    ];

     /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected $table = 'new_users'; 
    
    public function todos()
    {
        return $this->hasMany(Todo::class, 'user_id');
    }
}

