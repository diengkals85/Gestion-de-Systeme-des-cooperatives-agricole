<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ressource;
use App\Models\Cooperative;
use App\Models\Employe;

class EmployeController extends Controller
{
    //
	
	public function create()
		{
		// Récupérer tous les membres pour la liste déroulante
		$cooperatives = Cooperative::all();
		return view('employes.create', compact('cooperatives'));
        }
		
		
		 public function index()
    {
      //  $cotisations = Cotisation::all();
		
		$employes = Employe::with('cooperative')->get();
		 $employes = Employe::paginate(10); // Récupère 10 éléments par page
       return view('employes.index', compact('employes'));
    }
	
	public function store(Request $request)
		{
		   
				 $employes = new Employe;

					$employes->nom     = $request->nom;
					$employes->prenom  =$request->prenom;
					$employes->poste  =$request->poste;
					$employes->salaire  =$request->salaire;
					$employes->date_embauche  =$request->date_embauche;
					$employes->id_cooperative  = $request->id_cooperative;
					$employes->save();

				 return back()->with('message', "employe ajoutée avec succès !");
		}
		
			
      /**
     * Display the specified resource.
     */
    public function show(Employe $employe)
    {
		 // $cotisations = Cotisation::with('membre')->get();
		$cooperatives = Cooperative::all();
		
          return view('employes.show', compact('employe','cooperatives'));
		   
    }
	
	
	  /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employe $employe)
    {
			$cooperatives = Cooperative::all(); // Assurez-vous que `Cooperative` est le bon modèle pour récupérer les membres.
			return view('employes.edit', compact('employe', 'cooperatives'));
    }
	
	
	  /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employe $employe)
    {
	   	          	$employe->nom     = $request->nom;
					$employe->prenom  =$request->prenom;
					$employe->poste  =$request->poste;
					$employe->salaire  =$request->salaire;
					$employe->date_embauche  =$request->date_embauche;
					$employe->id_cooperative  = $request->id_cooperative;
					$employe->save();
    return back()->with('message', "L employe a bien été modifiée !");  
    }
	
	
	  /**
     * Remove the specified resource from storage.
     */
	 public function destroy(Employe $employe)
    {
          $employe->delete();
		  return redirect()->route('employes.index')->with('success', 'employe a ete bien suprime.');
    }
	
}
