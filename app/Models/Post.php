<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //Libera o campo title e content para serem preenchidos
    protected $fillable = [
        'title',
        'content',
    ];
}
