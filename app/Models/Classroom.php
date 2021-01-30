<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $guarded = [];

    // one class have many student
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
