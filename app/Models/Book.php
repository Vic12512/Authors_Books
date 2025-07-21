<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    //Campos que pueden ser asignados masivamente
    protected $fillable = [
        'name',
        'publication_date',
        'edition',
    ];
}
