<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Ressource;
use App\Models\Utilisateurressource;
use App\Models\Mouvement_stock;
use App\Models\Projetagricole;

class UtilisateurressourceController extends Controller
{
    
	
	public function create()
		{
		// Récupérer tous les membres pour la liste déroulante
		$projets = Projetagricole::all();
		$ressources =Ressource::all();
		$stocks  = Stock::all();
		return view('utilisationressources.create', compact('projets', 'ressources', 'stocks'));
        }
		
		
	  public function index()
    {
      //  $cotisations = Cotisation::all();
		
		$utilisationressources = Utilisateurressource::with('stock')->get();
		$utilisationressources = Utilisateurressource::with('ressource')->get();
		$utilisationressources = Utilisateurressource::with('projets')->get();
		 $utilisationressources = Utilisateurressource::paginate(10); // Récupère 10 éléments par page
       return view('utilisationressources.index', compact('utilisationressources'));
    }
	
	public function store(Request $request)
    {
        $request->validate([
            'quantite_utilise' => 'required|integer|min:1',
            'id_projet' => 'required|exists:projetagricoles,id',
            'id_ressource' => [
                'required',
                'exists:ressources,id',
                function ($attribute, $value, $fail) {
                    if (!Stock::where('id_ressource', $value)->exists()) {
                        $fail('Cette ressource ne possède pas de stock associé. Veuillez d\'abord créer un stock.');
                    }
                },
            ],
            'type_mouvement' => 'required|in:Entree,Sortie',
        ]);

        DB::beginTransaction();

        try {
            $ressource = Ressource::findOrFail($request->id_ressource);
            
            // Récupération du stock avec message personnalisé
            $stock = Stock::where('id_ressource', $ressource->id)->first();

            if (!$stock) {
                throw new \Exception("Aucun stock trouvé pour la ressource : {$ressource->nom_ressource}");
            }

            if ($request->type_mouvement === 'Sortie' && $stock->quantite_disponible < $request->quantite_utilise) {
                throw new \Exception("Stock insuffisant ! Disponible : {$stock->quantite_disponible}, Demande : {$request->quantite_utilise}");
            }

            $stock->quantite_disponible += ($request->type_mouvement === 'Entree') 
                ? $request->quantite_utilise 
                : -$request->quantite_utilise;
            $stock->save();

            Mouvement_stock::create([
                'type_mouvement' => $request->type_mouvement,
                'quantite' => $request->quantite_utilise,
                'date_mouvement' => now(),
                'id_stock' => $stock->id,
                'id_projet' => $request->id_projet,
            ]);

            Utilisateurressource::create([
                'quantite_utilise' => $request->quantite_utilise,
                'id_projet' => $request->id_projet,
                'id_ressource' => $request->id_ressource,
            ]);

            DB::commit();
            return back()->with('message', "Affectation réussie !");

        } catch (ModelNotFoundException $e) {
            DB::rollBack();
            return back()->withInput()->withErrors([
                'resource' => 'La ressource sélectionnée n\'existe pas dans notre base de données'
            ]);
            
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->withErrors([
                'stock' => $e->getMessage()
            ]);
        }
    }
	

}
