<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * @property array $hidden Description
     * @property array $append Description
     * @property array $fillable Description
     * @property array $casts Description
     */
    protected $fillable = [
        'name',
        'last_name',
        'credentials',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $append =[
        'full_name'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function UserCustomLends()
    {
        $this->hasMany(Lend::class, 'customer_user_id', 'id');
    }

    public function UserOwnerLends()
    {
        $this->hasMany(Lend::class, 'owner_user_id', 'id');
    }

    public function setPassword($password)
    {
        $this->attributes[ 'password' ] = bcrypt($password);
    }

    public function getFullName()
    {
        return "{$this->attributes['name']} {$this->attributes['last_name']}";
    }
}
