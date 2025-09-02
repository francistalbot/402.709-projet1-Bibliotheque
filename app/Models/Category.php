<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];
    protected $table = 'category';
    protected $primaryKey = 'id';

    // Définir la relation avec les livres si nécessaire
    public function livres()
    {
        return $this->hasMany(Livre::class, 'categorie_id');
    }
}
