<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    protected $guarded = [];

    // one publisher have many book
    public function book()
    {
        return $this->hasMany(Book::class);
    }
}
