<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Membre;

class MembreController extends Controller
{
    //
	
	 /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
       
	   // Récupérer le terme de recherche
        $search = $request->input('search');

        // Requête de base
        $query = Membre::query();

        // Appliquer la recherche si un terme est fourni
        if ($search) {
            $query->where('Nom_membre', 'like', "%{$search}%")
                  ->orWhere('Prenom_membre', 'like', "%{$search}%")
                  ->orWhere('contact_membre', 'like', "%{$search}%");
        }

        // Paginer les résultats
      //  $membres = $query->paginate(10);
		$membres = $query->paginate(10)->appends(['search' => $search]);

        // Retourner la vue avec les membres
        return view('membres.index', compact('membres'));
	   
	   
	   
  
    }
	
	
	 /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('membres.create');
    }



        /**
     * Store a newly created resource in storage.
     
	 
	 
	 
    public function store(Request $request)
    {
        
    $membre = new Membre;

    $membre->Nom_membre     = $request->nom_membre;
    $membre->Prenom_membre  =$request->prenom_membre;
	$membre->contact_membre  = $request->contact_membre;
    $membre->Status         = $request->status;
	$membre->Date_adhesion  = $request->date_adhesion;
    $membre->save();

    return back()->with('message', "Le membre a bien été créée !");
    }

*/
		


      /**
     * Display the specified resource.
     */
    public function show(Membre $membre)
    {
          return view('membres.show', compact('membre'));
    }
	
	   /**
     * Show the form for editing the specified resource.
     */
    public function edit(Membre $membre)
    {
         return view('membres.edit', compact('membre'));
    }


     /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Membre $membre)
    {
       
	
	    $membre->Nom_membre     = $request->nom_membre;
       $membre->Prenom_membre  =$request->prenom_membre;
	   $membre->contact_membre  = $request->contact_membre;
       $membre->Status         = $request->status;
	   $membre->Date_adhesion  = $request->date_adhesion;
       $membre->save();
	

    return back()->with('message', "Le membre a bien été modifiée !");  
    }
	
	
	  /**
     * Remove the specified resource from storage.
     */
	 public function destroy(Membre $membre)
    {
          $membre->delete();
		   return redirect()->route('membres.index')->with('success', 'Membre a ete bien suprime.');
    }
	
	
	
}
