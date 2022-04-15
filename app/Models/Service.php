<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom_fr', 'nom_de', 'nom_en','contenu_fr', 'contenu_de', 'contenu_en', 'image', 'slug', 'categorie_service_id', 'etat'
    ];

    public function realisations()
    {
        return $this->hasMany(Realisation::class);
    }

    public function categorie()
    {
        return $this->belongsTo(CategorieService::class, 'categorie_service_id');
    }
}
