<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
	
	protected $fillable = ['quantite_initiale','quantite_disponible','seuil_alerte','id_ressource','id_cooperative'];
	
		public function ressource()
		{
		return $this->belongsTo(Ressource::class, 'id_ressource');
		}
		
		public function cooperative()
		{
		return $this->belongsTo(Cooperative::class, 'id_cooperative');
		}
		
		
		
}
