<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Culture;

class CultureController extends Controller
{
    //
	 //
	
	 /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cultures = Culture::all();
       $cultures = Culture::paginate(10); // Récupère 10 éléments par page
    return view('cultures.index', compact('cultures'));
    }
	
	
	 /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('cultures.create');
    }
	
	
	
        /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    $culture = new Culture;

    $culture->Nom_culture     = $request->nom_culture;
    $culture->Description  =$request->description;
	$culture->rendement_estime  =$request->rendement_estime;
	$culture->rendement_reel  =$request->rendement_reel;
    $culture->save();
    return back()->with('message', "La culture a bien été créée !");
    }
	
	  /**
     * Display the specified resource.
     */
    public function show(Culture $culture)
    {
          return view('cultures.show', compact('culture'));
    }
	
	
	  /**
     * Show the form for editing the specified resource.
     */
    public function edit(Culture $culture)
    {
         return view('cultures.edit', compact('culture'));
    }
	
	 /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Culture $culture)
    {
       
	
	     $culture->Nom_culture     = $request->nom_culture;
       $culture->Description  =$request->description;
	   $culture->rendement_estime  =$request->rendement_estime;
	   $culture->rendement_reel  =$request->rendement_reel;
        $culture->save();
	

    return back()->with('message', "La  culture a bien été modifiée !");  
    }
	
	
	  /**
     * Remove the specified resource from storage.
     */
	 public function destroy(Culture $culture)
    {
          $culture->delete();
		   return redirect()->route('cultures.index')->with('success', 'Culture a ete bien suprime.');
    }
	
	

	
}
