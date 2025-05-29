<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class projetagricole extends Model
{
    use HasFactory;
	
	
	protected $fillable = ['Nom_projet','Description','Date_debut','Date_fin','Status_projet','id_membre'];
	
	public function membre()
		{
		return $this->belongsTo(Membre::class, 'id_membre');
		}
		
		// Relation avec les parcelles
    public function parcelles()
    {
        return $this->hasMany(Parcelle::class, 'id_projet');
    }
}
