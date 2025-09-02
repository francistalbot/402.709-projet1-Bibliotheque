<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = ['name', 'biography'];
    protected $table = 'author';
    protected $primaryKey = 'id';

    // Définir la relation avec les livres si nécessaire
    public function livres()
    {
        return $this->hasMany(Livre::class, 'auteur_id');
    }

}
