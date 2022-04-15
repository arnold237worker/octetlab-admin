<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorieService extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom_fr', 'nom_de', 'nom_en','contenu_fr', 'contenu_de', 'contenu_en', 'image', 'slug', 'etat'
    ];

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
