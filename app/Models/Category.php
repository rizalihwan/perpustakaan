<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    // one category have many book
    public function book()
    {
        return $this->hasMany(Book::class);
    }
}
