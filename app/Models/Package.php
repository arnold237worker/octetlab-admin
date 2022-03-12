<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_fr', 'nom_de', 'nom_en','services_fr', 'services_de', 'services_en', 'prix'
    ];
}
