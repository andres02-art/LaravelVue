<?php

namespace App\Models;
namespace App\Models\books;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Authors;
use App\Models\Authors\Authors as AuthorsAuthors;
use App\Models\categories;
use App\Models\categories\categories as CategoriesCategories;

class books extends Model
{
    use HasFactory;
    public function AutBoo()
    {
        return $this->hasMany(AuthorsAuthors::class);
    }
    public function catBoo()
    {
        return $this->hasMany(CategoriesCategories::class);
    }
}
