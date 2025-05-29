<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cooperative;
use App\Models\Transactionfinanciere;

class TransactionfinanciereController extends Controller
{
    //
	
		public function create()
		{
		$cooperatives = Cooperative::all();
		
		return view('transactions.create', compact('cooperatives'));
        }
		
		 public function index()
    {
     
		
		$transactions = Transactionfinanciere::with('cooperative')->get();
		 $transactions = Transactionfinanciere::paginate(10); // Récupère 10 éléments par page
       return view('transactions.index', compact('transactions'));
    }
	
	public function store(Request $request)
		{
		   
				 $transactions = new Transactionfinanciere;

					$transactions->type_transaction     = $request->type_transaction;
					$transactions->montant  =$request->montant;
					$transactions->description  =$request->description;
					$transactions->date_transaction  =$request->date_transaction;
					$transactions->id_cooperative  = $request->id_cooperative;
					
					$transactions->save();

				 return back()->with('message', "Transaction ajoutée avec succès !");
		}
		
		
		   /**
     * Display the specified resource.
     */
    public function show(Transactionfinanciere $transaction)
    {
		 // $cotisations = Cotisation::with('membre')->get();
		$cooperatives = Cooperative::all();
          return view('transactions.show', compact('transaction','cooperatives'));	   
    }
	
	
	
	  /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transactionfinanciere $transaction)
    {
	
			$cooperatives = Cooperative::all(); // Assurez-vous que `Cooperative` est le bon modèle pour récupérer les membres.
		  
			return view('transactions.edit', compact('transaction', 'cooperatives'));
    }
	
	 /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transactionfinanciere $transaction)
    {
       
	   	           $transaction->type_transaction  = $request->type_transaction;
					$transaction->montant  =$request->montant;
					$transaction->description  =$request->description;
					$transaction->date_transaction  =$request->date_transaction;
					$transaction->id_cooperative  = $request->id_cooperative;
					
					$transaction->save();
    return back()->with('message', "La Transaction a bien été modifiée !");  
    }
	
	 /**
     * Remove the specified resource from storage.
     */
	 public function destroy(Transactionfinanciere $transaction)
    {
          $transaction->delete();
		  return redirect()->route('transactions.index')->with('success', 'Transaction a ete bien suprime.');
    }
}
