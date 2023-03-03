<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// * @param Class Books App\Models\Books;
use App\Models\Books\Books;
// * @param Class User App\Models\User;
use App\Models\User\User;

class Lend extends Model
{
    use HasFactory;
    public function user_owner_lend()
    {
        return $this->hasMany(User::class);
    }
    public function user_custom_lend()
    {
        return $this->hasMany(User::class);
    }
    public function book_lend()
    {
        return $this->hasMany(Books::class);
    }
}
