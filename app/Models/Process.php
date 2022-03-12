<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre_fr', 'titre_de', 'titre_en','contenu_fr', 'contenu_de', 'contenu_en'
    ];

    public $table = 'process';
}
