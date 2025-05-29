<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ressource;
use App\Models\Cooperative;
use App\Models\Type_ressource;

class RessourceController extends Controller
{
    //
	
	public function create()
		{
		// Récupérer tous les membres pour la liste déroulante
		$cooperatives = Cooperative::all();
		$typeressources = Type_ressource::all();
		return view('ressources.create', compact('cooperatives'),compact('typeressources'));
        }
		
		
		 public function index()
    {
      //  $cotisations = Cotisation::all();
		
		$ressources = Ressource::with('cooperative')->get();
		$ressources = Ressource::with('typeressource')->get();
		 $ressources = Ressource::paginate(10); // Récupère 10 éléments par page
       return view('ressources.index', compact('ressources'));
    }
	
	public function store(Request $request)
		{
		   
				 $ressources = new Ressource;

					$ressources->nom_ressource     = $request->nom_ressource;
					$ressources->Qte_ressource  =$request->Qte_ressource;
					$ressources->id_cooperative  = $request->id_cooperative;
					$ressources->id_type  = $request->id_type;
					$ressources->save();

				 return back()->with('message', "Ressource ajoutée avec succès !");
		}
		
			
      /**
     * Display the specified resource.
     */
    public function show(Ressource $ressource)
    {
		 // $cotisations = Cotisation::with('membre')->get();
		$cooperatives = Cooperative::all();
		$typeressources = Type_ressource::all();
          return view('ressources.show', compact('ressource','cooperatives','typeressources'));
		   
    }
	
	
	  /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ressource $ressource)
    {
	
			$cooperatives = Cooperative::all(); // Assurez-vous que `Cooperative` est le bon modèle pour récupérer les membres.
		   $typeressources = Type_ressource::all();
			return view('ressources.edit', compact('ressource', 'cooperatives','typeressources'));
    }
	
	
	  /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ressource $ressource)
    {
       
	   	            $ressource->nom_ressource     = $request->nom_ressource;
					$ressource->Qte_ressource  =$request->Qte_ressource;
					$ressource->id_cooperative  = $request->id_cooperative;
					$ressource->id_type  = $request->id_type;
					$ressource->save();
    return back()->with('message', "La Ressource a bien été modifiée !");  
    }
	
	
	  /**
     * Remove the specified resource from storage.
     */
	 public function destroy(Ressource $ressource)
    {
		    // Vérifier si l'utilisateur a le rôle 'admin'
        if (!auth()->user()->hasRole('admin')) {
            abort(403, 'Accès non autorisé.');
        }

          $ressource->delete();
		  return redirect()->route('ressources.index')->with('success', 'ressource a ete bien suprime.');
    }
	
}
