<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;
	
	protected $fillable = ['nom','prenom','poste','salaire','date_embauche','id_cooperative'];
		
		
		public function cooperative()
		{
		return $this->belongsTo(Cooperative::class, 'id_cooperative');
		}
		
		
}
