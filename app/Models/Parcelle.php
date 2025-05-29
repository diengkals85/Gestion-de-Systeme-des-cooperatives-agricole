<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parcelle extends Model
{
    use HasFactory;
	
	  protected $fillable = [
        'nom_parcelle', 'superficie', 'localisation_gps', 'type_sol', 'ph_sol',
        'conductivite_electrique', 'taux_matiere_organique', 'azote_total', 'phosphore_assimilable',
        'potassium_echangeable', 'id_projet', 'id_culture', 'latitude','longitude'
    ];
	

	
	
		public function projet()
		{
		return $this->belongsTo(Projetagricole::class, 'id_projet');
		}
		
		public function culture()
		{
		return $this->belongsTo(Culture::class, 'id_culture');
		}
	
}
