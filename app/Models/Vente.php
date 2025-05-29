<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vente extends Model
{
    use HasFactory;
	protected $fillable = ['quantite','prix_vente', 'date_vente', 'status','id_produit','id_client'];
	
	
	public function produit()
		{
		return $this->belongsTo(Produit::class, 'id_produit');
		}
		
		public function client()
		{
		return $this->belongsTo(Client::class, 'id_client');
		}
	
}
