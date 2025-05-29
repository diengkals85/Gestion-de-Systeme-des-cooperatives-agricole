<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mouvement_stock extends Model
{
    use HasFactory;	
	protected $fillable = ['type_mouvement','quantite','date_mouvement','id_stock','id_projet'];	
	
	public function projet()
		{
		return $this->belongsTo(Ressource::class, 'id_projet');
		}
		public function stock()
		{
		return $this->belongsTo(Stock::class, 'id_stock');
		}		
}
