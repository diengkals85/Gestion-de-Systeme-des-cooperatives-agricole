<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transactionfinanciere extends Model
{
    use HasFactory;
	
	protected $fillable = ['type_transaction', 'montant', 'description','date_transaction','id_cooperative'];
	
	public function cooperative()
		{
		return $this->belongsTo(Cooperative::class, 'id_cooperative');
		}
		
		
}
