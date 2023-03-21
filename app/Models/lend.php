<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lend extends Model
{
    use HasFactory, SoftDeletes;
    /**
     * @property array $hidden Description
     * @property array $append Description
     * @property array $fillable Description
     * @property array $casts Description
     *
     */
    protected $hidden;
    protected $append;
    protected $fillable=[
        'book_id',
        'owner_user_id',
        'status',
        'date_in',
        'date_out'
    ];
    protected $casts;

    public function UserCustom()
    {
        return $this->belongsTo(User::class);
    }

    public function UserOwner()
    {
        return $this->belongsTo(User::class);
    }

    public function Book()
    {
        return $this->belongsTo(Book::class);
    }
}
