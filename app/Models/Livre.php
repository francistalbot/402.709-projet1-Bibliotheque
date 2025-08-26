<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
    protected $fillable = ['id', 'titre', 'auteur_id', 'isbn', 'publication_date', 'categorie_id', 'resume','prix' ];
    protected $table = 'livres';
    protected $primaryKey = 'id';
    public function auteur()
    {
        return $this->belongsTo(Author::class, 'auteur_id');
    }
    public function categorie()
    {
        return $this->belongsTo(Category::class, 'categorie_id');
    }


}
