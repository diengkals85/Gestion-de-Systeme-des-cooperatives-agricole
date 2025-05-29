<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cotisation extends Model
{
    use HasFactory;
	
	protected $fillable = ['Montant', 'Date_cotisation', 'id_membre'];
	
	public function membre()
		{
		return $this->belongsTo(Membre::class, 'id_membre');
		}
		
	
	
}