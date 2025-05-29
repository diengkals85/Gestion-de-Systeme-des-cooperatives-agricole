<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type_ressource;

class Type_ressourceController extends Controller
{
    //
	
	 public function create()
		{
		// Récupérer tous les membres pour la liste déroulante
		$typeressources = Type_ressource::all();
		return view('typeressources.create', compact('typeressources'));
        }
		
		
    public function index()
    {
      //  $cotisations = Cotisation::all();
		
	    $typeressources = Type_ressource::all();
		 $typeressources = Type_ressource::paginate(10); // Récupère 10 éléments par page
       return view('typeressources.index', compact('typeressources'));
    }
		
		
		public function store(Request $request)
		{
		  
				 $typeressources = new Type_ressource;

					$typeressources->type  = $request->type;
					$typeressources->save();
	
				 return back()->with('message', "Type Resource ajoutée avec succès !");
		}
		
		
      /**
     * Display the specified resource.
     */
    public function show(Type_ressource $typeressource)
    {
		 // $cotisations = Cotisation::with('membre')->get();
		 //  $ressources = Ressource::all();
		     $typeressources = Type_ressource::all();
          return view('typeressources.show', compact('typeressource'));
    }
	
	   /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type_ressource $typeressource)
    {
             //  $ressources = Ressource::all();
			return view('typeressources.edit', compact('typeressource'));
    }


     /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type_ressource $typeressource)
    {
       
	   	           $typeressource->type  = $request->type;
					$typeressource->save();
    return back()->with('message', "Le Type de resource a bien été modifiée !");  
    }
	
	
	  /**
     * Remove the specified resource from storage.
     */
	 public function destroy(Type_ressource $typeressource)
    {
          $typeressource->delete();
		  return redirect()->route('typeressources.index')->with('success', 'Type Ressource a ete bien suprime.');
    }




}


