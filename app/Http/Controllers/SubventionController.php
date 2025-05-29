<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ressource;
use App\Models\Cooperative;
use App\Models\Partenaire;
use App\Models\Subvention;

class SubventionController extends Controller
{
    //
	
	public function create()
		{
		// Récupérer tous les membres pour la liste déroulante
		$cooperatives = Cooperative::all();
		$partenaires = Partenaire::all();
		return view('subventions.create', compact('cooperatives'),compact('partenaires'));
        }
		
		
		 public function index()
    {
      //  $cotisations = Cotisation::all();
		
		$subventions = Subvention::with('cooperative')->get();
		$subventions = Subvention::with('partenaire')->get();
		 $subventions = Subvention::paginate(10); // Récupère 10 éléments par page
       return view('subventions.index', compact('subventions'));
    }
	
	public function store(Request $request)
		{
		   
				 $subventions = new Subvention;

					$subventions->date_reception     = $request->date_reception;
					$subventions->montant  =$request->montant;
					$subventions->description  =$request->description;
					$subventions->id_cooperative  = $request->id_cooperative;
					$subventions->id_partenaire  = $request->id_partenaire;
					$subventions->save();

				 return back()->with('message', "Partenaire ajoutée avec succès !");
		}
		
			
      /**
     * Display the specified resource.
     */
    public function show(Subvention $subvention)
    {
		 // $cotisations = Cotisation::with('membre')->get();
		$cooperatives = Cooperative::all();
		$partenaires = Partenaire::all();
          return view('subventions.show', compact('subvention','cooperatives','partenaires'));
		   
    }
	
	
	  /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subvention $subvention)
    {
	
			$cooperatives = Cooperative::all(); // Assurez-vous que `Cooperative` est le bon modèle pour récupérer les membres.
		   $partenaires = Partenaire::all();
			return view('subventions.edit', compact('subvention', 'cooperatives','partenaires'));
    }
	
	
	  /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subvention $subvention)
    {
       
	   	             $subvention->date_reception     = $request->date_reception;
					$subvention->montant  =$request->montant;
					$subvention->description  =$request->description;
					$subvention->id_cooperative  = $request->id_cooperative;
					$subvention->id_partenaire  = $request->id_partenaire;
					$subvention->save();
    return back()->with('message', "La subvention a bien été modifiée !");  
    }
	
	
	  /**
     * Remove the specified resource from storage.
     */
	 public function destroy(Subvention $subvention)
    {
          $ressource->delete();
		  return redirect()->route('subventions.index')->with('success', 'subvention a ete bien suprime.');
    }
	
}
