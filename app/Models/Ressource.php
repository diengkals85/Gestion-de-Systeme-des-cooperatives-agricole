<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ressource extends Model
{
    use HasFactory;
	protected $fillable = ['nom_ressource','Qte_ressource', 'id_cooperative', 'id_type'];
	
	
	public function cooperative()
		{
		return $this->belongsTo(Cooperative::class, 'id_cooperative');
		}
		
		public function typeressource()
		{
		return $this->belongsTo(Type_ressource::class, 'id_type');
		}
	
}
