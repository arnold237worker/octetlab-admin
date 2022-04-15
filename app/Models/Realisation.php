<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Realisation extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_fr', 
        'nom_de', 
        'nom_en', 
        'contenu_fr', 
        'contenu_de', 
        'contenu_en', 
        'presentation_client_fr', 
        'presentation_client_de', 
        'presentation_client_en', 
        'client',
        'date_realisation',
        'lien', 
        'slug', 
        'service_id',
        'etat'
    ];

    public function images()
    {
        return $this->hasMany(RealisationImage::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
