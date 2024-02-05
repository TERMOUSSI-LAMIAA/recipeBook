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
        'img',
        'user_id',
    ];
    public $timestamps = false;
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
