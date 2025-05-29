<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    //
	
	 /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all();
       $clients = Client::paginate(10); // Récupère 10 éléments par page
    return view('clients.index', compact('clients'));
    }
	
	
	 /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('clients.create');
    }



        /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
		
		
			   // Validation des données (à ajouter si nécessaire)
			$request->validate([
				'nom_client' => 'required|string|max:255',
				'prenom_client' => 'required|string|max:255',
				'contact' => 'required|string|min:8',
				'email' => 'required|email|unique:users,email',
				'adresse' => 'required|string|max:255',
			]);
        
				$clients = new Client;

				$clients->nom_client     = $request->nom_client;
				$clients->prenom_client  =$request->prenom_client;
				$clients->contact  = $request->contact;
				$clients->email         = $request->email;
				$clients->adresse  = $request->adresse;
				$clients->save();

    return back()->with('message', "Le client a bien été créée !");
    }


      /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
          return view('clients.show', compact('client'));
    }
	
	   /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
         return view('clients.edit', compact('client'));
    }


     /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
		
		       // Validation des données (à ajouter si nécessaire)
			$request->validate([
				'nom_client' => 'required|string|max:255',
				'prenom_client' => 'required|string|max:255',
				'contact' => 'required|string|min:8',
				'email' => 'required|email|unique:users,email',
				'adresse' => 'required|string|max:255',
			]);

	            $client->nom_client     = $request->nom_client;
				$client->prenom_client  =$request->prenom_client;
				$client->contact  = $request->contact;
				$client->email         = $request->email;
				$client->adresse  = $request->adresse;
				$client->save();
	

    return back()->with('message', "Le client a bien été modifiée !");  
    }
	
	
	  /**
     * Remove the specified resource from storage.
     */
	 public function destroy(Client $client)
    {
          $client->delete();
		   return redirect()->route('clients.index')->with('success', 'Client a ete bien suprime.');
    }
	
	
	
}
