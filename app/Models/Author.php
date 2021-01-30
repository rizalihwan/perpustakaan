<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $guarded = [];

    // one author have many book
    public function book()
    {
        return $this->hasMany(Book::class);
    }
}
