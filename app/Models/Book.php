<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = [];

    // eagerload for optimization load query relationship
    protected $with = ['category', 'author', 'publisher'];

    //one bookdetail have one category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //one bookdetail have one author
    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    //one bookdetail have one publisher
    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    //one book have many borrowing
    public function borrowing()
    {
        return $this->hasMany(Borrowing::class);
    }

    // book status accessor
    public function getBookStatusAttribute()
    {
        return $this->stock >= 1 ? 'tersedia' : 'kosong';
    }

    // img book accessor
    public function getBookImgAttribute()
    {
        return "/storage/" . $this->thumbnail;
    }
}
