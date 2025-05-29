<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class culture extends Model
{
    use HasFactory;
	
	  protected $fillable = [
        'Nom_Culture', 'Description','rendement_estime','rendement_reek'
    ];
	
	 // Relation avec les parcelles
    public function parcelles()
    {
        return $this->hasMany(Parcelle::class, 'id_culture');
    }
}
