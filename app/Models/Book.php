<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    use HasFactory;

    //Campos que pueden ser asignados masivamente
    protected $fillable = [
        'name',
        'publication_date',
        'edition',
    ];

    /** *
     * Relación con autores (un libro tiene muchos autores)
    */
    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }
  
        
}
