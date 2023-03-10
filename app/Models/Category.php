<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
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

    public function Category_Books()
    {
        $this->hasMany(Category::class, 'category_id', 'id');
    }
}
