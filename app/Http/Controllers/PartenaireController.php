<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partenaire;

class PartenaireController extends Controller
{
    //
	
	 /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partenaires = Partenaire::all();
       $partenaires = Partenaire::paginate(10); // Récupère 10 éléments par page
    return view('partenaires.index', compact('partenaires'));
    }
	
	
	 /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('partenaires.create');
    }



        /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    $partenaire = new Partenaire;

    $partenaire->nom_partenaire = $request->nom_partenaire;
    $partenaire->type_partenaire =$request->type_partenaire;
	$partenaire->contact = $request->contact;
    $partenaire->email   = $request->email;
	$partenaire->adresse   = $request->adresse;
      $partenaire->save();

    return back()->with('message', "Le partenaire a bien été créée !");
    }


      /**
     * Display the specified resource.
     */
    public function show(Partenaire $partenaire)
    {
          return view('partenaires.show', compact('partenaire'));
    }
	
	   /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partenaire $partenaire)
    {
         return view('partenaires.edit', compact('partenaire'));
    }


     /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Partenaire $partenaire)
    {
       
	
	    $partenaire->nom_partenaire = $request->nom_partenaire;
		$partenaire->type_partenaire =$request->type_partenaire;
		$partenaire->contact = $request->contact;
		$partenaire->email   = $request->email;
		$partenaire->adresse   = $request->adresse;
		$partenaire->save();
	

    return back()->with('message', "Le partenaire a bien été modifiée !");  
    }
	
	
	  /**
     * Remove the specified resource from storage.
     */
	 public function destroy(Partenaire $partenaire)
    {
          $partenaire->delete();
		   return redirect()->route('partenaires.index')->with('success', 'Partenaire a ete bien suprime.');
    }
	
	
	
}
