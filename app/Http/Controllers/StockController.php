<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ressource;
use App\Models\Cooperative;
use App\Models\Stock;

class StockController extends Controller
{
    //
	
	public function create()
		{
		// Récupérer tous les membres pour la liste déroulante
		$cooperatives = Cooperative::all();
		$ressources =Ressource::all();
		return view('stocks.create', compact('cooperatives'),compact('ressources'));
        }
		
		
		 public function index()
    {
    
	         $stocks = Stock::with('ressource')->get();
				  $alertes = [];
				foreach ($stocks as $stock) {
					if ($stock->quantite_disponible <= $stock->seuil_alerte) {
						$alertes[] = "Attention ! La ressource '{$stock->ressource->nom_ressource}' est en dessous du seuil d'alerte.";
					}
				}
					
		$stocks = Stock::with('cooperative')->get();
		 $stocks = Stock::paginate(10); // Récupère 10 éléments par page
       return view('stocks.index', compact('stocks','alertes'));
    }
	
	public function store(Request $request)
		{
		   
				 $stocks = new Stock;

					$stocks->quantite_initiale    = $request->quantite_initiale;
					$stocks->quantite_disponible  =$request->quantite_disponible;
					$stocks->seuil_alerte         =$request->seuil_alerte;
					$stocks->id_ressource         = $request->id_ressource;
					$stocks->id_cooperative       = $request->id_cooperative;
					$stocks->save();

				 return back()->with('message', "Stock ajoutée avec succès !");
		}
		
			
      /**
     * Display the specified resource.
     */
    public function show(Stock $stock)
    {
		 // $cotisations = Cotisation::with('membre')->get();
		$cooperatives = Cooperative::all();
		$ressources = Ressource::all();
          return view('stocks.show', compact('stock','cooperatives','ressources'));
		   
    }
	
	
	  /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stock $stock)
    {
	
			$cooperatives = Cooperative::all(); // Assurez-vous que `Cooperative` est le bon modèle pour récupérer les membres.
		   $ressources = Ressource::all();
			return view('stocks.edit', compact('stock', 'cooperatives','ressources'));
    }
	
	
	  /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stock $stock)
    {
       
	   	           	$stock->quantite_initiale    = $request->quantite_initiale;
					$stock->quantite_disponible  =$request->quantite_disponible;
					$stock->seuil_alerte         =$request->seuil_alerte;
					$stock->id_ressource         = $request->id_ressource;
					$stock->id_cooperative       = $request->id_cooperative;
					$stock->save();
    return back()->with('message', "Le Stokc a bien été modifiée !");  
    }
	
	
	  /**
     * Remove the specified resource from storage.
     */
	 public function destroy(Stock $stock)
    {
          $ressource->delete();
		  return redirect()->route('stocks.index')->with('success', 'Stock a ete bien suprime.');
    }
	
}
