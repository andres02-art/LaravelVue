<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    /**
     * @property array $hidden Description
     * @property array $append Description
     * @property array $fillable Description
     * @property array $casts Description
     *
     */
    protected $hidden = [
        ''
    ];
    protected $append = [
        ''
    ];
    protected $fillable = [
        'author_id',
        'category_id',
        'title',
        'stock',
        'description',
        'created_at',
        'updated_at',


    ];
    protected $casts = [
        '' => ''
    ];

    public function Author_Books()
    {
        $this->belongsTo(Author::class, 'author_id', 'id');
    }

    public function Category_Books()
    {
        $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function Book_Lends()
    {
        $this->hasMany(Lend::class, 'book_id', 'id');
    }
}
