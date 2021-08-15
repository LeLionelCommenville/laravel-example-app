<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name'
    ];

    protected $hidden = [
        'pivot',
        'created_at',
        'updated_at',
        'id'
    ];
 
    public function books()
    {
        return $this->belongsToMany(Books::class, 'books_author', 'author_id', 'books_id');
    }
}
