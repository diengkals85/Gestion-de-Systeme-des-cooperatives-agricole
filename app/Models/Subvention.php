<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subvention extends Model
{
    use HasFactory;
	protected $fillable = ['date_reception','montant', 'description', 'id_partenaire','id_cooperative'];
	
	
	public function cooperative()
		{
		return $this->belongsTo(Cooperative::class, 'id_cooperative');
		}
		
		public function partenaire()
		{
		return $this->belongsTo(Partenaire::class, 'id_partenaire');
		}
	
}
