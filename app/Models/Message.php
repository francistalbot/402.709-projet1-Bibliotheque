<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['id', 'texte', 'email', 'name'];
    protected $table = 'messages';
    protected $primaryKey = 'id';
}
