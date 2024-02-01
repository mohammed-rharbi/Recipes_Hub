<?php

namespace App\Models;

use App\Models\Recipes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;


    public function recipes(){

        return $this->hasMany(Recipes::class);
    }
}
