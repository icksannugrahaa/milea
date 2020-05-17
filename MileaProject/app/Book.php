<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'judul', 'pengarang', 'penerbit', 'sinopsis', 'tahunterbit', 'hal'
    ];

    public function bookCover() {
        return $this->hasMany('App\BookCover', 'book_id');
    }
}
