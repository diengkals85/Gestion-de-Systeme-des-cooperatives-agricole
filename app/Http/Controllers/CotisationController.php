<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cotisation;
use App\Models\Membre;
use Barryvdh\DomPDF\Facade\Pdf;

class CotisationController extends Controller
{
    //
	
	 public function create()
		{
		// Récupérer tous les membres pour la liste déroulante
		$membres = Membre::all();
		return view('cotisations.create', compact('membres'));
        }
		
		public function receipt($id)
		{
			// Récupérer la cotisation
			$cotisation = Cotisation::with('membre')->findOrFail($id);

			// Générer le PDF
			$pdf = Pdf::loadView('cotisations.receipt', compact('cotisation'));

			// Télécharger ou afficher le PDF
			return $pdf->download('receipt.pdf');
		}
		
		
    public function index()
    {
      //  $cotisations = Cotisation::all();
		
		$cotisations = Cotisation::with('membre')->get();
		 $cotisations = Cotisation::paginate(10); // Récupère 10 éléments par page
       return view('cotisations.index', compact('cotisations'));
    }
		
		
		public function store(Request $request)
		{
		  
				
				 $cotisations = new Cotisation;

					$cotisations->Montant     = $request->montant;
					$cotisations->Date_cotisation  =$request->date_cotisation;
					$cotisations->id_membre  = $request->id_membre;
					$cotisations->save();

							  // Générer le lien de téléchargement du reçu
						$lien_reçu = route('cotisations.receipt', ['id' => $cotisations->id]);

						// Retourner à la vue avec un message de succès et le lien de téléchargement
						return redirect()->back()->with([
							'success' => 'Cotisation enregistrée avec succès !',
							'lien_reçu' => $lien_reçu,
						]);
			
		 }
		
		
		
		
		
		
      /**
     * Display the specified resource.
     */
    public function show(Cotisation $cotisation)
    {
		 // $cotisations = Cotisation::with('membre')->get();
		  $membres = Membre::all();
          return view('cotisations.show', compact('cotisation','membres'));
    }
	
	   /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cotisation $cotisation)
    {
		  // $cotisation = Cotisation::with('membre')->get();
        //  return view('cotisations.edit', compact('cotisation'));
		 
		 // Récupérer tous les membres depuis la base de données
			$membres = Membre::all(); // Assurez-vous que `Membre` est le bon modèle pour récupérer les membres.

			// Retourner la vue avec la cotisation et les membres
			return view('cotisations.edit', compact('cotisation', 'membres'));
    }


     /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cotisation $cotisation)
    {
       
	   	    $cotisation->Montant     = $request->montant;
		    $cotisation->Date_cotisation  =$request->date_cotisation;
		    $cotisation->id_membre  = $request->id_membre;
		    $cotisation->save();
    return back()->with('message', "La cotisation a bien été modifiée !");  
    }
	
	
	  /**
     * Remove the specified resource from storage.
     */
	 public function destroy(Cotisation $cotisation)
    {
          $cotisation->delete();
		  return redirect()->route('cotisations.index')->with('success', 'Cotisation a ete bien suprime.');
    }




}


