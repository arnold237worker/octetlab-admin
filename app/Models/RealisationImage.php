<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RealisationImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'path', 'realisation_id'
    ];

    public $table = 'realisations_images';

    public function realisation()
    {
        return $this->belongsTo(Realisation::class);
    }
}
