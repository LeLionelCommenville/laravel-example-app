<?php

namespace App\Models;

use App\Model\Author;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Books extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'overview'
    ];

    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }
}
