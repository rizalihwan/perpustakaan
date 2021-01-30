<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    protected $guarded = [];

    // eagerload for optimization load query relationship
    protected $with = ['student', 'book'];

    //one borrowing have one student
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    //one borrowing have one book
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
