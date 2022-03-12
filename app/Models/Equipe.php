<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom', 'email', 'poste_fr', 'poste_en', 'poste_de', 'facebook', 'linkedin', 'instagram', 'image'
    ];
}
