<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Ressource;
use App\Models\Cooperative;
use App\Models\Client;
use App\Models\Vente;
use App\Models\Produit;

class VenteController extends Controller
{
    //
	
	public function create()
		{
		// Récupérer tous les membres pour la liste déroulante
		$produits = Produit::all();
		$clients = Client::all();
		return view('ventes.create', compact('produits','clients'));
        }
		
		
		 public function index()
    {
      //  $cotisations = Cotisation::all();
		
		$ventes = Vente::with('client')->get();
		$ventes = Vente::with('produit')->get();
		 $ventes = Vente::paginate(10); // Récupère 10 éléments par page
       return view('ventes.index', compact('ventes'));
    }
	
	public function store(Request $request)
		{
							 // Validation des données
					$request->validate([
						'quantite' => 'required|integer|min:1',
						'prix_vente' => 'required|numeric|min:0',
						'date_vente' => 'required|date',
						'status' => 'required|string|max:255',
						'id_produit' => 'required|exists:produits,id',
						'id_client' => 'required|exists:clients,id',
					]);

					// Démarrer une transaction de base de données
					DB::beginTransaction();

					try {
						// Récupérer le produit
						$produit = Produit::findOrFail($request->id_produit);

						// Vérifier si la quantité en stock est suffisante
						if ($produit->quantite < $request->quantite) {
							return back()->with('error', 'Stock insuffisant pour ce produit.');
						}

						// Créer la vente
						$vente = new Vente;
						$vente->quantite = $request->quantite;
						$vente->prix_vente = $request->prix_vente;
						$vente->date_vente = $request->date_vente;
						$vente->status = $request->status;
						$vente->id_produit = $request->id_produit;
						$vente->id_client = $request->id_client;
						$vente->save();

						// Mettre à jour la quantité en stock
						$produit->quantite -= $request->quantite;
						$produit->save();

						// Valider la transaction
						DB::commit();

						// Rediriger avec un message de succès
						return back()->with('success', 'Vente enregistrée avec succès !');
					} catch (\Exception $e) {
						// Annuler la transaction en cas d'erreur
						DB::rollBack();

						// Rediriger avec un message d'erreur
						return back()->with('error', 'Une erreur est survenue : ' . $e->getMessage());
					}
          }
		
			
      /**
     * Display the specified resource.
     */
    public function show(Vente $vente)
    {
		 // $cotisations = Cotisation::with('membre')->get();
		$produits = Produit::all();
		$clients = Client::all();
          return view('ventes.show', compact('vente','produits','clients'));
		   
    }
	
	
	  /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vente $vente)
    {
	
			$produits = Produit::all();
		     $clients = Client::all();
			return view('ventes.edit', compact('vente', 'produits','clients'));
    }
	
	
	  /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vente $vente)
    {
							  // Validation des données
					$request->validate([
						'quantite' => 'required|integer|min:1',
						'prix_vente' => 'required|numeric|min:0',
						'date_vente' => 'required|date',
						'status' => 'required|string|max:255',
						'id_produit' => 'required|exists:produits,id',
						'id_client' => 'required|exists:clients,id',
					]);

					// Démarrer une transaction de base de données
					DB::beginTransaction();

					try {
						// Récupérer la vente existante
						$vente = Vente::findOrFail($id);

						// Récupérer le produit associé
						$produit = Produit::findOrFail($request->id_produit);

						// Calculer la différence de quantité
						$differenceQuantite = $request->quantite - $vente->quantite;

						// Vérifier si le stock est suffisant pour la nouvelle quantité
						if ($produit->quantite < $differenceQuantite) {
							return back()->with('error', 'Stock insuffisant pour cette mise à jour.');
						}

						// Mettre à jour la vente
						$vente->quantite = $request->quantite;
						$vente->prix_vente = $request->prix_vente;
						$vente->date_vente = $request->date_vente;
						$vente->status = $request->status;
						$vente->id_produit = $request->id_produit;
						$vente->id_client = $request->id_client;
						$vente->save();

						// Ajuster la quantité en stock
						$produit->quantite -= $differenceQuantite;
						$produit->save();

						// Valider la transaction
						DB::commit();

						// Rediriger avec un message de succès
						return back()->with('message', 'Vente mise à jour avec succès !');
					} catch (\Exception $e) {
						// Annuler la transaction en cas d'erreur
						DB::rollBack();

						// Rediriger avec un message d'erreur
						return back()->with('error', 'Une erreur est survenue : ' . $e->getMessage());
					}
   }
	
	
	  /**
     * Remove the specified resource from storage.
     */
	 public function destroy(Vente $vente)
    {
          $vente->delete();
		  return redirect()->route('ventes.index')->with('success', 'vente a ete bien suprime.');
    }
	
}
