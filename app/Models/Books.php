<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Author;

class Books extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'overview'
    ];
    
    protected $hidden = [
        'pivot',
        'created_at',
        'updated_at',
        'id'
    ];

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'books_author', 'books_id', 'author_id');
    }
}
