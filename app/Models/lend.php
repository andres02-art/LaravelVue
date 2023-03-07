<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lend extends Model
{
    use HasFactory;
    /**
     * @property array $hidden Description
     * @property array $append Description
     * @property array $fillable Description
     * @property array $casts Description
     *
     */
    protected $hidden;
    protected $append;
    protected $fillable;
    protected $casts;

    public function User_Custom_Lends()
    {
        $this->hasMany(User::class, 'customer_user_id', 'id');
    }

    public function User_Owner_Lends()
    {
        $this->hasMany(User::class, 'owner_user_id', 'id');
    }

    public function Book_Lends()
    {
        $this->hasMany(Book::class, 'book_id', 'id');
    }
}
