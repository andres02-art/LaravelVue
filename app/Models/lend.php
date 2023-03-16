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

    public function UserCustomLends()
    {
        $this->belongsTo(User::class, 'customer_user_id', 'id');
    }

    public function UserOwnerLends()
    {
        $this->belongsTo(User::class, 'owner_user_id', 'id');
    }

    public function BookLends()
    {
        $this->belongsTo(Book::class, 'book_id', 'id');
    }
}
