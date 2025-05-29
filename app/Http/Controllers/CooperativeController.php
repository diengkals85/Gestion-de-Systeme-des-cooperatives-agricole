<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cooperative;

class CooperativeController extends Controller
{
    //
	
	
	/**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cooperatives = Cooperative::all();
        $cooperatives = Cooperative::paginate(10); // Récupère 10 éléments par page
        return view('cooperatives.index', compact('cooperatives'));
    }
	
	
		 /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('cooperatives.create');
    }
	
	    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    $cooperative = new Cooperative;
    $cooperative->nom_cooperative     = $request->nom_cooperative;
    $cooperative->adresse  =$request->adresse;
	$cooperative->date_creation  = $request->date_creation;
    $cooperative->save();

    return back()->with('message', "La Cooperative a bien été créée !");
    }
	
	
      /**
     * Display the specified resource.
     */
    public function show(Cooperative $cooperative)
    {
          return view('cooperatives.show', compact('cooperative'));
    }
	
	   /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cooperative $cooperative)
    {
         return view('cooperatives.edit', compact('cooperative'));
    }
	
	
	  /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cooperative $cooperative)
    {
       
	
    $cooperative->nom_cooperative     = $request->nom_cooperative;
    $cooperative->adresse  =$request->adresse;
	$cooperative->date_creation  = $request->date_creation;
    $cooperative->save();
	

    return back()->with('message', "La Cooperative a bien été modifiée !");  
    }
	
	
	  /**
     * Remove the specified resource from storage.
     */
	 public function destroy(Cooperative $cooperative)
    {
          $cooperative->delete();
		   return redirect()->route('cooperatives.index')->with('success', 'Cooperative a ete bien suprime.');
    }
	


}
