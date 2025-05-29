<?php

namespace App\Http\Controllers;
use App\Models\Culture;
use App\Models\Parcelle;
use App\Models\Projetagricole;

use Illuminate\Http\Request;

class ParcelleController extends Controller
{
    //
	
	
	 public function create()
		{
		// Récupérer tous les membres pour la liste déroulante
		$projets = Projetagricole::all();
		$cultures = Culture::all();
		
		return view('parcelles.create', compact('projets'),compact('cultures'));
        }
		
		
		
	  public function index()
    {
      //  $cotisations = Cotisation::all();
		
		$parcelles = Parcelle::with('projet')->get();
		$parcelles = parcelle::with('culture')->get();
		
		 $parcelles = Parcelle::paginate(10); // Récupère 10 éléments par page
		 
		 
       return view('parcelles.index', compact('parcelles'));
    }
		
		
		
		  public function store(Request $request) {
              /*     $request->validate([
					'nom_parcelle' => 'required|string|max:255',
					'superficie' => 'required|numeric',
					'localisation_gps' => 'required|string',
					'type_sol' => 'required|string',
					'ph_sol' => 'required|numeric|min:0|max:14',
					'id_projet' => 'required|numeric',
					'id_culture' => 'required|numeric',
					'latitude' => 'required|numeric', // Validation pour la latitude
					'longitude' => 'required|numeric', // Validation pour la longitude
				]);**/
					
		
		
		         $parcelles = new Parcelle;

					$parcelles->nom_parcelle     = $request->nom_parcelle;
					$parcelles->superficie     = $request->superficie;
					$parcelles->localisation_gps  =$request->localisation_gps;
					$parcelles->type_sol  =$request->type_sol;
					$parcelles->ph_sol  = $request->ph_sol;
					$parcelles->id_projet  = $request->id_projet;
					$parcelles->id_culture  = $request->id_culture;
					$parcelles->rendement  = $request->rendement;
					$parcelle->latitude = $request->latitude; // Enregistrer la latitude
                    $parcelle->longitude = $request->longitude; // Enregistrer la longitude
					$parcelles->save();

       //  Parcelle::create($request->all());

      //   return redirect()->back()->with('success', 'Parcelle ajoutée avec succès!');
		 return back()->with('message', "Parcelle ajoutée avec succès !");
		
		  }
		  
		  
					/**
			 * Display the specified resource.
			 */
			public function show(Parcelle $parcelle)
			{
				 // $cotisations = Cotisation::with('membre')->get();
				  $projets = Projetagricole::all();
				   $cultures = Culture::all();
				  return view('parcelles.show', compact('parcelle','cultures','projets'));
			}
			
			
			   /**
     * Show the form for editing the specified resource.
     */
    public function edit(Parcelle $parcelle)
    {
		
		 // Récupérer tous les membres depuis la base de données
			$projets = Projetagricole::all(); // Assurez-vous que `Membre` est le bon modèle pour récupérer les membres.
			$cultures = Culture::all(); // Assurez-vous que `Membre` est le bon modèle pour récupérer les membres.

			// Retourner la vue avec la cotisation et les membres
			return view('parcelles.edit', compact('parcelle','cultures','projets'));
			

    }
	
	
	/**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Parcelle $parcelle)
    {
		      /*    $request->validate([
					'nom_parcelle' => 'required|string|max:255',
					'superficie' => 'required|numeric',
					'localisation_gps' => 'required|string',
					'type_sol' => 'required|string',
					'ph_sol' => 'required|numeric|min:0|max:14',
					'id_projet' => 'required|numeric',
					'id_culture' => 'required|numeric',
					'latitude' => 'required|string|max:255', // Validation pour la latitude
					'longitude' => 'required|string|max:255', // Validation pour la longitude
				]);  **/
       
	   	           
					$parcelle->nom_parcelle     = $request->nom_parcelle;
					$parcelle->superficie     = $request->superficie;
					$parcelle->localisation_gps  =$request->localisation_gps;
					$parcelle->type_sol  =$request->type_sol;
					$parcelle->ph_sol  = $request->ph_sol;
					$parcelle->id_projet  = $request->id_projet;
					$parcelle->id_culture  = $request->id_culture;
					$parcelle->rendement  = $request->rendement;
					$parcelle->latitude = $request->latitude; // Mettre à jour la latitude
                    $parcelle->longitude = $request->longitude; // Mettre à jour la longitude
					$parcelle->save();
    return back()->with('message', "Le Parcelle a bien été modifiée !");  
    }
	
	  /**
     * Remove the specified resource from storage.
     */
	 public function destroy(Parcelle $parcelle)
    {
          $parcelle->delete();
		  return redirect()->route('parcelles.index')->with('success', 'Parcelles a ete bien suprime.');
    }
				
		
}
