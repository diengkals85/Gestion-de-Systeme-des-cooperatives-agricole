<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membre;
use App\Models\Projetagricole;

class ProjetagricoleController extends Controller
{
    //
	
	  public function create()
		{
		// Récupérer tous les membres pour la liste déroulante
		$membres = Membre::all();
		return view('projets.create', compact('membres'));
        }
		
		   public function index()
    {
      //  $cotisations = Cotisation::all();
		
		$projets = Projetagricole::with('membre')->get();
		 $projets = Projetagricole::paginate(10); // Récupère 10 éléments par page
       return view('projets.index', compact('projets'));
    }
	
	
	public function store(Request $request)
		{
		          $request->validate([
            'Nom_projet' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'Status_projet' => 'required|string|max:255',
            'id_membre' => 'required|exists:membres,id',
        ]);
			   
			   
				 $projets = new Projetagricole;

					$projets->Nom_projet     = $request->Nom_projet;
					$projets->Description     = $request->description;
					$projets->Date_debut  =$request->date_debut;
					$projets->Date_fin  =$request->date_fin;
					$projets->Status_projet  = $request->Status_projet;
					$projets->id_membre  = $request->id_membre;
					$projets->save();
	
				// Créer la cotisation
			//	Cotisation::create($request->all());

					//	//return redirect()->route('cotisations.index')->with('success', 'Cotisation ajoutée avec succès.');
				 return back()->with('message', "Projet  ajoutée avec succès !");
		}
		
			
      /**
     * Display the specified resource.
     */
    public function show(Projetagricole $projet)
    {
		 // $cotisations = Cotisation::with('membre')->get();
		  $membres = Membre::all();
          return view('projets.show', compact('projet','membres'));
    }
	
	   /**
     * Show the form for editing the specified resource.
     */
    public function edit(Projetagricole $projet)
    {
		  // $cotisation = Cotisation::with('membre')->get();
        //  return view('cotisations.edit', compact('cotisation'));
		 
		 // Récupérer tous les membres depuis la base de données
			$membres = Membre::all(); // Assurez-vous que `Membre` est le bon modèle pour récupérer les membres.

			// Retourner la vue avec la cotisation et les membres
			return view('projets.edit', compact('projet', 'membres'));
    }
	
	
	     /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Projetagricole $projet)
    {
       
	   	           
					$projet->Nom_projet     = $request->Nom_projet;
					$projet->Description     = $request->description;
					$projet->Date_debut    =$request->Date_debut;
					$projet->Date_fin     =$request->Date_fin;
					$projet->Status_projet  = $request->Status_projet;
					$projet->id_membre  = $request->id_membre;
					$projet->save();
    return back()->with('message', "Le Projet a bien été modifiée !");  
    }
	
	
	  /**
     * Remove the specified resource from storage.
     */
	 public function destroy(Projetagricole $projet)
    {
          $projet->delete();
		  return redirect()->route('projets.index')->with('success', 'Projet a ete bien suprime.');
    }

	
}
