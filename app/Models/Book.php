<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory, SoftDeletes;
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
        'title',
        'stock',
        'description',
        'author_id',
        'category_id',
        'created_at',
        'updated_at',
    ];
    protected $casts = [
        '' => ''
    ];

    public function Author()
    {
        return $this->belongsTo(Author::class);
    }

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }
    public function Lends()
    {
        return $this->hasMany(Lend::class);
    }
}
