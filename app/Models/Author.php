<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    use HasFactory, SoftDeletes;
    /**
     * @property array $hidden Description
     * @property array $append Description
     * @property array $fillable Description
     * @property array $casts Description
     *
     protected $hidden = [
    ];
    protected $append = [
    ];
     */
    protected $fillable = [
        'name',
        'biography'
    ];
    /**
    protected $casts = [
    ];
    * */

    public function AuthorBooks()
    {
        $this->hasMany(Book::class, 'author_id', 'id');
    }
}
