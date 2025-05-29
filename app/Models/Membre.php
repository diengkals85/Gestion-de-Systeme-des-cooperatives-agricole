<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membre extends Model
{
	
	
    use HasFactory;
	protected $fillable = ['Nom_membre', 'Prenom_membre', 'contact_membre','Status', 'Date_adhesion'];
	
	
	public function cotisations()
		{
		return $this->hasMany(Cotisation::class, 'id_membre');
		}
		
		
		public function projets()
		{
		return $this->hasMany(Projetagricole::class, 'id_membre');
		}
		
	
					
		
		
	
	
}
