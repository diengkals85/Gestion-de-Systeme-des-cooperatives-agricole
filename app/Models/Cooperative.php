<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cooperative extends Model
{
    use HasFactory;
	
	protected $fillable = ['nom_cooperative', 'adresse', 'date_creation'];
	
	public function membre()
		{
		return $this->belongsTo(Membre::class, 'id_membre');
		}
	
}
