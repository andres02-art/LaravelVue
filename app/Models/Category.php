<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;
    /**
     * @property array $hidden Description
     * @property array $append Description
     * @property array $fillable Description
     * @property array $casts Description
     */
    protected $hidden = [
        ''
    ];
    protected $append = [
        ''
    ];
    protected $fillable = [
        'name'
    ];
    protected $casts = [
        '' => ''
    ];

    public function Books()
    {
        return $this->hasMany(Book::class);
    }
}
