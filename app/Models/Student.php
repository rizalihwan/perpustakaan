<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded = [];

    // eagerload for optimization load query relationship
    protected $with = ['classroom'];

    //one student have one classroom
    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    //one student have one borrowing
    public function borrowing()
    {
        return $this->hasOne(Borrowing::class);
    }


    // fullname accessor
    public function getFullNameAttribute()
    {
        return $this->first_name." ".$this->last_name;
    }

    // gender accessor
    public function getFilterGenderAttribute()
    {
        return $this->gender == 0 ? 'Laki - Laki' : 'Perempuan';
    }
}
