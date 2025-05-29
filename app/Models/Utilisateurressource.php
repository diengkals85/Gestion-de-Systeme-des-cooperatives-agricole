<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateurressource extends Model
{
    use HasFactory;
	
	protected $fillable = ['quantite_utilise','id_projet','id_ressource'];
	
	
	public function ressource()
		{
		return $this->belongsTo(Ressource::class, 'id_ressource');
		}
		
		public function projet()
		{
		return $this->belongsTo(Projet::class, 'id_projet');
		}
		
}
