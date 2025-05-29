<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Membre;

class ProduitController extends Controller
{
    //
	
		 public function create()
		{
		// Récupérer tous les membres pour la liste déroulante
		$membres = Membre::all();
		return view('produits.create', compact('membres'));
        }
		
		 public function index()
     {

		$produits = Produit::with('membre')->get();
		 $produits = Produit::paginate(10); // Récupère 10 éléments par page
       return view('produits.index', compact('produits'));
     }
		
		public function store(Request $request)
		{
		   
				 $produits = new Produit;

					$produits->Nom_produit     = $request->Nom_produit;
					$produits->quantite  =$request->quantite;
					$produits->quantite_initiale  =$request->quantite_initiale;
					$produits->prix  =$request->prix;
					$produits->id_membre  = $request->id_membre;
					$produits->save();
	
				 return back()->with('message', "Produit ajoutée avec succès !");
		}
		
	
    public function show(Produit $produit)
    {
		 // $cotisations = Cotisation::with('membre')->get();
		//  $produits = Produit::all();
		  $membres = Membre::all();
          return view('produits.show', compact('produit','membres'));
    }
	

    public function edit(Produit $produit)
    {
	
			//$produits = Produit::all();// Assurez-vous que `Membre` est le bon modèle pour récupérer les membres.
			$membres = Membre::all();
			return view('produits.edit', compact('produit', 'membres'));
    }
	
	 /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produit $produit)
    {
	   	   $produit->Nom_produit  = $request->Nom_produit;
					$produit->quantite  =$request->quantite;
					$produit->quantite_initiale  =$request->quantite_initiale;
					$produit->prix  =$request->prix;
					$produit->id_membre  = $request->id_membre;
					$produit->save();
    return back()->with('message', "Le Produit  a bien été modifiée !");  
    }
	
	
	  /**
     * Remove the specified resource from storage.
     */
	 public function destroy(Produit $produit)
    {
          $produit->delete();
		  return redirect()->route('produits.index')->with('success', 'Porduit a ete bien suprime.');
    }
}
