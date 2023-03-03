<?php

namespace App\Models;
namespace App\Models\Books;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// * @param Class Authors App\Models\Authors;
use App\Models\Authors\Authors;
// * @param class Categories App\Models\Categories;
use App\Models\Categories\Categories;

class Books extends Model
{
    use HasFactory;
    public function AutBoo()
    {
        return $this->hasMany(Authors::class);
    }
    public function catBoo()
    {
        return $this->hasMany(Categories::class);
    }
}
