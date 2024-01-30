<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recette extends Model
{
    use HasFactory;
    protected $table = 'recette';
    protected $primaryKey = 'idr';
    protected $fillable = [
        'idr',
        'titre',
        'description',
        'ingredients',
        'instructions',
        'img'
    ];
    public $timestamps = false;
}
