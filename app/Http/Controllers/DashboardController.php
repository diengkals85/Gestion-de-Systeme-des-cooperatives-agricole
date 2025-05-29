<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Projetagricole;
use App\Models\Stock;
use App\Models\Vente;
use App\Models\Employe;
use App\Models\Membre;
use App\Models\Ressource;
use App\Models\type_ressource;
use App\Models\Client;
use App\Models\Cooperative;
use App\Models\Culture;
use App\Models\Mouvement_stock;
use App\Models\Parcelle;
use App\Models\Produit;
use App\Models\Transactionfinanciere;
use App\Models\Utilisateurressource;



class DashboardController extends Controller
{
    //
      
	   public function index()
    {
		
		           // 📊 Nombre total de membres et leur statut
        $totalMembres = Membre::count();
        $membresActifs = Membre::where('status', 'actif')->count();
        $membresInactifs = Membre::where('status', 'inactif')->count();
		
		
		// 📊 Nombre de projets et leur état
        $totalProjets = Projetagricole::count();
        $projetsPlanifies = Projetagricole::where('Status_projet', 'planifié')->count();
        $projetsEnCours = Projetagricole::where('Status_projet', 'en cours')->count();
        $projetsTermines = Projetagricole::where('Status_projet', 'terminé')->count();
		
		// 📊 Ressources disponibles
        $stocks = Stock::all();
        $totalStock = $stocks->sum('quantite_disponible');

		 // 📊 Transactions financières récentes
        $revenus = Transactionfinanciere::where('type_transaction', 'Entree')->sum('montant');
        $depenses = Transactionfinanciere::where('type_transaction', 'sortie')->sum('montant');
        $benefice = $revenus - $depenses;
		
		
		// ⚠️ Alertes (stocks faibles, projets en retard)
        $stocksFaibles = Stock::whereColumn('quantite_disponible', '<=', 'seuil_alerte')->get();
        $projetsEnRetard = Projetagricole::where('Status_projet', 'en cours')
            ->whereDate('Date_fin', '<', now())
            ->get();
			
	     // 📊 Suivi des projets, cultures et parcelles
       
          // Récupérer les projets avec leurs parcelles et les cultures associées
		// $projets = Projetagricole::with('culture.parcelles')->get();
		 $projets = Projetagricole::with('parcelles.culture')->get();
		 
		   // Récupérer toutes les cultures avec leurs parcelles
        $cultures = Culture::with('parcelles')->get();

        // Récupérer toutes les parcelles
        $parcelles = Parcelle::all();

          // Total des ventes
    $totalVentes = DB::table('ventes')
        ->selectRaw('SUM(quantite) as total_quantite, SUM(quantite * prix_vente) as total_valeur')
        ->first();

    // Ventes par statut
    $ventesParStatut = DB::table('ventes')
        ->select('status', DB::raw('COUNT(*) as nombre_ventes'))
        ->groupBy('status')
        ->get();

    // Chiffre d'affaires par mois
    $evolutionVentes = DB::table('ventes')
        ->selectRaw('DATE_FORMAT(date_vente, "%Y-%m") as mois, SUM(quantite * prix_vente) as chiffre_affaires')
        ->groupBy('mois')
        ->orderBy('mois')
        ->get();
		
		
		 // Chiffre d'affaires du mois en cours
    $chiffreAffairesMois = DB::table('ventes')
        ->whereMonth('date_vente', now()->month) // Filtre pour le mois en cours
        ->whereYear('date_vente', now()->year)   // Filtre pour l'année en cours
        ->sum(DB::raw('quantite * prix_vente'));

    // Produits les plus vendus
    $produitsVendus = DB::table('ventes')
        ->join('produits', 'ventes.id_produit', '=', 'produits.id')
        ->select('produits.Nom_produit', DB::raw('SUM(ventes.quantite) as total_quantite'))
        ->groupBy('produits.Nom_produit')
        ->orderByDesc('total_quantite')
        ->get();

    // Ventes récentes avec Eloquent
    $ventesRecentes = Vente::with(['produit', 'client'])
        ->orderByDesc('date_vente')
        ->limit(10)
        ->get();

	


       // Revenus des transactions
        $revenusTransactions = DB::table('transactionfinancieres')
            ->where('type_transaction', 'entree')
            ->sum('montant');

        // Revenus des subventions
        $revenusSubventions = DB::table('subventions')
            ->sum('montant');

        // Dépenses des transactions
        $depensesTransactions = DB::table('transactionfinancieres')
            ->where('type_transaction', 'sortie')
            ->sum('montant');

        // Dépenses des ressources
        $depensesRessources = DB::table('utilisateurressources')
            ->join('ressources', 'utilisateurressources.Id_ressource', '=', 'ressources.id')
            ->sum(DB::raw('ressources.Qte_ressource * utilisateurressources.Quantite_utilise'));

        // Solde financier
        $soldeFinancier = ($revenusTransactions + $revenusSubventions) - ($depensesTransactions + $depensesRessources);

        // Évolution des revenus et dépenses par mois
        $evolutionRevenus = DB::table('transactionfinancieres')
            ->selectRaw('DATE_FORMAT(date_transaction, "%Y-%m") AS mois, SUM(montant) AS revenus')
            ->where('type_transaction', 'revenu')
            ->groupBy('mois')
            ->orderBy('mois')
            ->get();

        $evolutionDepenses = DB::table('transactionfinancieres')
            ->selectRaw('DATE_FORMAT(date_transaction, "%Y-%m") AS mois, SUM(montant) AS depenses')
            ->where('type_transaction', 'sortie')
            ->groupBy('mois')
            ->orderBy('mois')
            ->get();

        // Dernières transactions
        $dernieresTransactions = DB::table('transactionfinancieres')
            ->orderByDesc('date_transaction')
            ->limit(10)
            ->get();

        // Dernières subventions
        $dernieresSubventions = DB::table('subventions')
            ->orderByDesc('date_reception')
            ->limit(10)
            ->get();	
			
			
			
			// Nombre de cultures
        $nombreCultures = DB::table('cultures')->count();

        // Nombre de parcelles
        $nombreParcelles = DB::table('parcelles')->count();

        // Cultures par parcelle
        $culturesParParcelle = DB::table('parcelles')
            ->leftJoin('cultures', 'parcelles.id_culture', '=', 'cultures.id')
            ->select('parcelles.nom_parcelle', 'cultures.Nom_Culture')
            ->get();

        // Rendement par culture
        $rendementParCulture = DB::table('cultures')
            ->join('parcelles', 'cultures.id', '=', 'parcelles.id_culture')
            ->select('cultures.Nom_Culture', DB::raw('SUM(parcelles.rendement) AS rendement_total'))
            ->groupBy('cultures.Nom_Culture')
            ->get();

        // État des parcelles
        $etatParcelles = DB::table('parcelles')
            ->leftJoin('cultures', 'parcelles.id_culture', '=', 'cultures.id')
            ->select('parcelles.nom_parcelle', 'parcelles.superficie', 'parcelles.type_sol', 'parcelles.ph_sol', 'cultures.Nom_Culture')
            ->get();

        // Parcelles par projet
        $parcellesParProjet = DB::table('projetagricoles')
            ->join('parcelles', 'projetagricoles.id', '=', 'parcelles.id_projet')
            ->select('projetagricoles.Nom_projet', DB::raw('COUNT(parcelles.id) AS nombre_parcelles'))
            ->groupBy('projetagricoles.Nom_projet')
            ->get();
			
			

		
        // 📊 1. Nombre de membres par mois
        $membresParMois = Membre::selectRaw('COUNT(id) as count, MONTH(created_at) as mois')
            ->groupBy('mois')
            ->orderBy('mois')
            ->pluck('count', 'mois')->toArray();

        // 📊 2. Répartition des ressources par type
        $ressourcesParType = Ressource::selectRaw('COUNT(id) as count, id_type')
            ->groupBy('id_type')
            ->pluck('count', 'id_type')->toArray();

        // 📊 3. Évolution des ventes par mois
        $ventesParMois = Vente::selectRaw('SUM(prix_vente) as total, MONTH(date_vente) as mois')
            ->groupBy('mois')
            ->orderBy('mois')
            ->pluck('total', 'mois')->toArray();

        // 📊 4. État du stock (liste des ressources et quantités disponibles)
        // $stocks = Stock::with('ressource')->get();
		
		return view('dashboard', compact(
            'totalMembres', 'membresActifs', 'membresInactifs',
            'totalProjets', 'projetsPlanifies', 'projetsEnCours', 'projetsTermines',
            'totalStock', 'stocks',
            'revenus', 'depenses', 'benefice',
            'stocksFaibles', 'projetsEnRetard','membresParMois', 'ressourcesParType', 'ventesParMois',
			 'projets', 'cultures', 'parcelles','totalVentes', 'ventesParStatut', 'evolutionVentes', 'produitsVendus', 'ventesRecentes','chiffreAffairesMois', 'revenusTransactions', 'revenusSubventions', 'depensesTransactions', 'depensesRessources',
            'soldeFinancier', 'evolutionRevenus', 'evolutionDepenses', 'dernieresTransactions', 'dernieresSubventions','nombreCultures', 'nombreParcelles', 'culturesParParcelle', 'rendementParCulture', 'etatParcelles', 'parcellesParProjet'
        ));


       //   return view('dashboard', compact('membresParMois', 'ressourcesParType', 'ventesParMois', 'stocks'));
    }
	
}
