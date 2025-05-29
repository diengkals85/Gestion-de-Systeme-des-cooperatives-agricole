<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produit extends Model
{
    use HasFactory;
	
	protected $fillable = ['Nom_produit','quantite','quantite_initiale','prix','id_membre'];
		public function membre()
		{
		return $this->belongsTo(Membre::class, 'id_membre');
		}
		
}
