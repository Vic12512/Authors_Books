<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Author extends Model
{
    use HasFactory;

    //Campos que pueden ser asignados masivamente
    protected $fillable = [
        'first_name',
        'last_name',
        'country',
        'active',
    ];

    /**
     * Relación con libros (un autor tiene muchos libros)
     */
    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }
}
