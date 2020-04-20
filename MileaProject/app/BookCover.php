<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookCover extends Model
{
    protected $table        = 'book_covers';
    protected $primaryKey   = 'id';
   
    protected $fillable     = [
                                'book_id', 'image'
                            ];
}
