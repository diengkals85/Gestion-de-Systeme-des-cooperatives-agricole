<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MembreController;
use App\Http\Controllers\CotisationController;
use App\Http\Controllers\CultureController;
use App\Http\Controllers\ProjetagricoleController;
use App\Http\Controllers\CooperativeController;
use App\Http\Controllers\ParcelleController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\RessourceController;
use App\Http\Controllers\TransactionfinanciereController;
use App\Http\Controllers\UtilisateurressourceController;
use App\Http\Controllers\Type_ressourceController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\VenteController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PartenaireController;
use App\Http\Controllers\SubventionController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::resource('membres', MembreController::class)->middleware('auth');
//Route::resource('cotisations',CotisationController::class)->middleware('auth');
//Route::resource('cultures', CultureController::class)->middleware('auth');
//Route::resource('projets', ProjetagricoleController::class)->middleware('auth');
//Route::resource('cooperatives', CooperativeController::class)->middleware('auth');
//Route::resource('parcelles', ParcelleController::class)->middleware('auth');
//Route::resource('produits', ProduitController::class)->middleware('auth');
//Route::resource('ressources', RessourceController::class)->middleware('auth');
//Route::resource('transactions', TransactionfinanciereController::class)->middleware('auth');
//Route::resource('utilisationressources', UtilisateurressourceController::class)->middleware('auth');  
//Route::resource('typeressources', Type_ressourceController::class)->middleware('auth');  
//Route::resource('stocks', StockController::class)->middleware('auth'); 
//Route::resource('clients', ClientController::class)->middleware('auth'); 
//Route::resource('ventes', VenteController::class)->middleware('auth'); 
//Route::resource('employes', EmployeController::class)->middleware('auth'); 
//Route::resource('partenaires', PartenaireController::class)->middleware('auth'); 
//Route::resource('subventions', SubventionController::class)->middleware('auth'); 


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



// Routes accessibles à tous les utilisateurs authentifiés
Route::middleware('auth')->group(function () {
    // Lister les ressources
    Route::get('/ressources', [RessourceController::class, 'index'])->name('ressources.index');

    // Afficher le formulaire de création
    Route::get('/ressources/create', [RessourceController::class, 'create'])->name('ressources.create');

    // Enregistrer une nouvelle ressource
    Route::post('/ressources', [RessourceController::class, 'store'])->name('ressources.store');

    // Afficher les détails d'une ressource
    Route::get('/ressources/{ressource}', [RessourceController::class, 'show'])->name('ressources.show');

    // Afficher le formulaire d'édition
    Route::get('/ressources/{ressource}/edit', [RessourceController::class, 'edit'])->name('ressources.edit');

    // Mettre à jour une ressource
    Route::put('/ressources/{ressource}', [RessourceController::class, 'update'])->name('ressources.update');
});

// Route de suppression réservée aux administrateurs
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::delete('/ressources/{ressource}', [RessourceController::class, 'destroy'])->name('ressources.destroy');
});



// Routes accessibles à tous les utilisateurs authentifiés
Route::middleware('auth')->group(function () {
    // Lister les ressources
    Route::get('/membres', [MembreController::class, 'index'])->name('membres.index');

    // Afficher le formulaire de création
    Route::get('/membres/create', [MembreController::class, 'create'])->name('membres.create');

    // Enregistrer une nouvelle ressource
    Route::post('/membres', [MembreController::class, 'store'])->name('membres.store');

    // Afficher les détails d'une ressource
    Route::get('/membres/{membre}', [MembreController::class, 'show'])->name('membres.show');

    // Afficher le formulaire d'édition
    Route::get('/membres/{membre}/edit', [MembreController::class, 'edit'])->name('membres.edit');

    // Mettre à jour une ressource
    Route::put('/membres/{membre}', [MembreController::class, 'update'])->name('membres.update');
});

// Route de suppression réservée aux administrateurs
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::delete('/membres/{membre}', [MembreController::class, 'destroy'])->name('membres.destroy');
});


// Routes accessibles à tous les utilisateurs authentifiés
Route::middleware('auth')->group(function () {
    // Lister les ressources
    Route::get('/cotisations', [CotisationController::class, 'index'])->name('cotisations.index');

    // Afficher le formulaire de création
    Route::get('/cotisations/create', [CotisationController::class, 'create'])->name('cotisations.create');

    // Enregistrer une nouvelle ressource
    Route::post('/cotisations', [CotisationController::class, 'store'])->name('cotisations.store');

    // Afficher les détails d'une ressource
    Route::get('/cotisations/{cotisation}', [CotisationController::class, 'show'])->name('cotisations.show');

    // Afficher le formulaire d'édition
    Route::get('/cotisations/{cotisation}/edit', [CotisationController::class, 'edit'])->name('cotisations.edit');

    // Mettre à jour une ressource
    Route::put('/cotisations/{cotisation}', [CotisationController::class, 'update'])->name('cotisations.update');
});
  Route::get('/cotisations/{id}/receipt', [CotisationController::class, 'receipt'])->name('cotisations.receipt');



// Route de suppression réservée aux administrateurs
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::delete('/cotisations/{cotisation}', [CotisationController::class, 'destroy'])->name('cotisations.destroy');
});

// Routes accessibles à tous les utilisateurs authentifiés
Route::middleware('auth')->group(function () {
    // Lister les ressources
    Route::get('/cultures', [CultureController::class, 'index'])->name('cultures.index');

    // Afficher le formulaire de création
    Route::get('/cultures/create', [CultureController::class, 'create'])->name('cultures.create');

    // Enregistrer une nouvelle ressource
    Route::post('/cultures', [CultureController::class, 'store'])->name('cultures.store');

    // Afficher les détails d'une ressource
    Route::get('/cultures/{culture}', [CultureController::class, 'show'])->name('cultures.show');

    // Afficher le formulaire d'édition
    Route::get('/cultures/{culture}/edit', [CultureController::class, 'edit'])->name('cultures.edit');

    // Mettre à jour une ressource
    Route::put('/cultures/{culture}', [CultureController::class, 'update'])->name('cultures.update');
});

// Route de suppression réservée aux administrateurs
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::delete('/cultures/{culture}', [CultureController::class, 'destroy'])->name('cultures.destroy');
});


// Routes accessibles à tous les utilisateurs authentifiés
Route::middleware('auth')->group(function () {
    // Lister les ressources
    Route::get('/projets', [ProjetagricoleController::class, 'index'])->name('projets.index');

    // Afficher le formulaire de création
    Route::get('/projets/create', [ProjetagricoleController::class, 'create'])->name('projets.create');

    // Enregistrer une nouvelle ressource
    Route::post('/projets', [ProjetagricoleController::class, 'store'])->name('projets.store');

    // Afficher les détails d'une ressource
    Route::get('/projets/{projet}', [ProjetagricoleController::class, 'show'])->name('projets.show');

    // Afficher le formulaire d'édition
    Route::get('/projets/{projet}/edit', [ProjetagricoleController::class, 'edit'])->name('projets.edit');

    // Mettre à jour une ressource
    Route::put('/projets/{projet}', [ProjetagricoleController::class, 'update'])->name('projets.update');
});

// Route de suppression réservée aux administrateurs
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::delete('/projets/{projet}', [ProjetagricoleController::class, 'destroy'])->name('projets.destroy');
});


// Routes accessibles à tous les utilisateurs authentifiés
Route::middleware('auth')->group(function () {
    // Lister les ressources
    Route::get('/cooperatives', [CooperativeController::class, 'index'])->name('cooperatives.index');

    // Afficher le formulaire de création
    Route::get('/cooperatives/create', [CooperativeController::class, 'create'])->name('cooperatives.create');

    // Enregistrer une nouvelle ressource
    Route::post('/cooperatives', [CooperativeController::class, 'store'])->name('cooperatives.store');

    // Afficher les détails d'une ressource
    Route::get('/cooperatives/{cooperative}', [CooperativeController::class, 'show'])->name('cooperatives.show');

    // Afficher le formulaire d'édition
    Route::get('/cooperatives/{cooperative}/edit', [CooperativeController::class, 'edit'])->name('cooperatives.edit');

    // Mettre à jour une ressource
    Route::put('/cooperatives/{cooperative}', [CooperativeController::class, 'update'])->name('cooperatives.update');
});

// Route de suppression réservée aux administrateurs
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::delete('/cooperatives/{cooperative}', [CooperativeController::class, 'destroy'])->name('cooperatives.destroy');
});


// Routes accessibles à tous les utilisateurs authentifiés
Route::middleware('auth')->group(function () {
    // Lister les ressources
    Route::get('/parcelles', [ParcelleController::class, 'index'])->name('parcelles.index');

    // Afficher le formulaire de création
    Route::get('/parcelles/create', [ParcelleController::class, 'create'])->name('parcelles.create');

    // Enregistrer une nouvelle ressource
    Route::post('/parcelles', [ParcelleController::class, 'store'])->name('parcelles.store');

    // Afficher les détails d'une ressource
    Route::get('/parcelles/{parcelle}', [ParcelleController::class, 'show'])->name('parcelles.show');

    // Afficher le formulaire d'édition
    Route::get('/parcelles/{parcelle}/edit', [ParcelleController::class, 'edit'])->name('parcelles.edit');

    // Mettre à jour une ressource
    Route::put('/parcelles/{parcelle}', [ParcelleController::class, 'update'])->name('parcelles.update');
});

// Route de suppression réservée aux administrateurs
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::delete('/parcelles/{parcelle}', [ParcelleController::class, 'destroy'])->name('parcelles.destroy');
});


// Routes accessibles à tous les utilisateurs authentifiés
Route::middleware('auth')->group(function () {
    // Lister les ressources
    Route::get('/produits', [ProduitController::class, 'index'])->name('produits.index');

    // Afficher le formulaire de création
    Route::get('/produits/create', [ProduitController::class, 'create'])->name('produits.create');

    // Enregistrer une nouvelle ressource
    Route::post('/produits', [ProduitController::class, 'store'])->name('produits.store');

    // Afficher les détails d'une ressource
    Route::get('/produits/{produit}', [ProduitController::class, 'show'])->name('produits.show');

    // Afficher le formulaire d'édition
    Route::get('/produits/{produit}/edit', [ProduitController::class, 'edit'])->name('produits.edit');

    // Mettre à jour une ressource
    Route::put('/produits/{produit}', [ProduitController::class, 'update'])->name('produits.update');
});

// Route de suppression réservée aux administrateurs
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::delete('/produits/{produit}', [ProduitController::class, 'destroy'])->name('produits.destroy');
});

// Routes accessibles à tous les utilisateurs authentifiés
Route::middleware('auth')->group(function () {
    // Lister les ressources
    Route::get('/transactions', [TransactionfinanciereController::class, 'index'])->name('transactions.index');

    // Afficher le formulaire de création
    Route::get('/transactions/create', [TransactionfinanciereController::class, 'create'])->name('transactions.create');

    // Enregistrer une nouvelle ressource
    Route::post('/transactions', [TransactionfinanciereController::class, 'store'])->name('transactions.store');

    // Afficher les détails d'une ressource
    Route::get('/transactions/{transaction}', [TransactionfinanciereController::class, 'show'])->name('transactions.show');

    // Afficher le formulaire d'édition
    Route::get('/transactions/{transaction}/edit', [TransactionfinanciereController::class, 'edit'])->name('transactions.edit');

    // Mettre à jour une ressource
    Route::put('/transactions/{transaction}', [TransactionfinanciereController::class, 'update'])->name('transactions.update');
});

// Route de suppression réservée aux administrateurs
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::delete('/transactions/{transaction}', [TransactionfinanciereController::class, 'destroy'])->name('transactions.destroy');
});

// Routes accessibles à tous les utilisateurs authentifiés
Route::middleware('auth')->group(function () {
    // Lister les ressources
    Route::get('/utilisationressources', [UtilisateurressourceController::class, 'index'])->name('utilisationressources.index');

    // Afficher le formulaire de création
    Route::get('/utilisationressources/create', [UtilisateurressourceController::class, 'create'])->name('utilisationressources.create');

    // Enregistrer une nouvelle ressource
    Route::post('/utilisationressources', [UtilisateurressourceController::class, 'store'])->name('utilisationressources.store');

    // Afficher les détails d'une ressource
    Route::get('/utilisationressources/{utilisationressource}', [UtilisateurressourceController::class, 'show'])->name('utilisationressources.show');

    // Afficher le formulaire d'édition
    Route::get('/utilisationressources/{utilisationressource}/edit', [UtilisateurressourceController::class, 'edit'])->name('utilisationressources.edit');

    // Mettre à jour une ressource
    Route::put('/utilisationressources/{utilisationressource}', [UtilisateurressourceController::class, 'update'])->name('utilisationressources.update');
});

// Route de suppression réservée aux administrateurs
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::delete('/utilisationressources/{utilisationressource}', [UtilisateurressourceController::class, 'destroy'])->name('utilisationressources.destroy');
});


// Routes accessibles à tous les utilisateurs authentifiés
Route::middleware('auth')->group(function () {
    // Lister les ressources
    Route::get('/typeressources', [Type_ressourceController::class, 'index'])->name('typeressources.index');

    // Afficher le formulaire de création
    Route::get('/typeressources/create', [Type_ressourceController::class, 'create'])->name('typeressources.create');

    // Enregistrer une nouvelle ressource
    Route::post('/typeressources', [Type_ressourceController::class, 'store'])->name('typeressources.store');

    // Afficher les détails d'une ressource
    Route::get('/typeressources/{typeressource}', [Type_ressourceController::class, 'show'])->name('typeressources.show');

    // Afficher le formulaire d'édition
    Route::get('/typeressources/{typeressource}/edit', [Type_ressourceController::class, 'edit'])->name('typeressources.edit');

    // Mettre à jour une ressource
    Route::put('/typeressources/{typeressource}', [Type_ressourceController::class, 'update'])->name('typeressources.update');
});

// Route de suppression réservée aux administrateurs
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::delete('/typeressources/{typeressource}', [Type_ressourceController::class, 'destroy'])->name('typeressources.destroy');
});


// Routes accessibles à tous les utilisateurs authentifiés
Route::middleware('auth')->group(function () {
    // Lister les ressources
    Route::get('/stocks', [StockController::class, 'index'])->name('stocks.index');

    // Afficher le formulaire de création
    Route::get('/stocks/create', [StockController::class, 'create'])->name('stocks.create');

    // Enregistrer une nouvelle ressource
    Route::post('/stocks', [StockController::class, 'store'])->name('stocks.store');

    // Afficher les détails d'une ressource
    Route::get('/stocks/{stock}', [StockController::class, 'show'])->name('stocks.show');

    // Afficher le formulaire d'édition
    Route::get('/stocks/{stock}/edit', [StockController::class, 'edit'])->name('stocks.edit');

    // Mettre à jour une ressource
    Route::put('/stocks/{stock}', [StockController::class, 'update'])->name('stocks.update');
});

// Route de suppression réservée aux administrateurs
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::delete('/stocks/{stock}', [StockController::class, 'destroy'])->name('stocks.destroy');
});


// Routes accessibles à tous les utilisateurs authentifiés
Route::middleware('auth')->group(function () {
    // Lister les ressources
    Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');

    // Afficher le formulaire de création
    Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');

    // Enregistrer une nouvelle ressource
    Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');

    // Afficher les détails d'une ressource
    Route::get('/clients/{client}', [ClientController::class, 'show'])->name('clients.show');

    // Afficher le formulaire d'édition
    Route::get('/clients/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');

    // Mettre à jour une ressource
    Route::put('/clients/{client}', [ClientController::class, 'update'])->name('clients.update');
});

// Route de suppression réservée aux administrateurs
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::delete('/clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');
});


// Routes accessibles à tous les utilisateurs authentifiés
Route::middleware('auth')->group(function () {
    // Lister les ressources
    Route::get('/ventes', [VenteController::class, 'index'])->name('ventes.index');

    // Afficher le formulaire de création
    Route::get('/ventes/create', [VenteController::class, 'create'])->name('ventes.create');

    // Enregistrer une nouvelle ressource
    Route::post('/ventes', [VenteController::class, 'store'])->name('ventes.store');

    // Afficher les détails d'une ressource
    Route::get('/ventes/{vente}', [VenteController::class, 'show'])->name('ventes.show');

    // Afficher le formulaire d'édition
    Route::get('/ventes/{vente}/edit', [VenteController::class, 'edit'])->name('ventes.edit');

    // Mettre à jour une ressource
    Route::put('/ventes/{vente}', [VenteController::class, 'update'])->name('ventes.update');
});

// Route de suppression réservée aux administrateurs
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::delete('/ventes/{vente}', [VenteController::class, 'destroy'])->name('ventes.destroy');
});



// Routes accessibles à tous les utilisateurs authentifiés
Route::middleware('auth')->group(function () {
    // Lister les ressources
    Route::get('/subventions', [SubventionController::class, 'index'])->name('subventions.index');

    // Afficher le formulaire de création
    Route::get('/subventions/create', [SubventionController::class, 'create'])->name('subventions.create');

    // Enregistrer une nouvelle ressource
    Route::post('/subventions', [SubventionController::class, 'store'])->name('subventions.store');

    // Afficher les détails d'une ressource
    Route::get('/subventions/{subvention}', [SubventionController::class, 'show'])->name('subventions.show');

    // Afficher le formulaire d'édition
    Route::get('/subventions/{subvention}/edit', [SubventionController::class, 'edit'])->name('subventions.edit');

    // Mettre à jour une ressource
    Route::put('/subventions/{subvention}', [SubventionController::class, 'update'])->name('subventions.update');
});

// Route de suppression réservée aux administrateurs
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::delete('/subventions/{subvention}', [SubventionController::class, 'destroy'])->name('subventions.destroy');
});




// Routes accessibles à tous les utilisateurs authentifiés
Route::middleware('auth')->group(function () {
    // Lister les ressources
    Route::get('/employes', [EmployeController::class, 'index'])->name('employes.index');

    // Afficher le formulaire de création
    Route::get('/employes/create', [EmployeController::class, 'create'])->name('employes.create');

    // Enregistrer une nouvelle ressource
    Route::post('/employes', [EmployeController::class, 'store'])->name('employes.store');

    // Afficher les détails d'une ressource
    Route::get('/employes/{employe}', [EmployeController::class, 'show'])->name('employes.show');

    // Afficher le formulaire d'édition
    Route::get('/employes/{employe}/edit', [EmployeController::class, 'edit'])->name('employes.edit');

    // Mettre à jour une ressource
    Route::put('/employes/{employe}', [EmployeController::class, 'update'])->name('employes.update');
});

// Route de suppression réservée aux administrateurs
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::delete('/employes/{employe}', [EmployeController::class, 'destroy'])->name('employes.destroy');
});





// Routes accessibles à tous les utilisateurs authentifiés
Route::middleware('auth')->group(function () {
    // Lister les ressources
    Route::get('/partenaires', [PartenaireController::class, 'index'])->name('partenaires.index');

    // Afficher le formulaire de création
    Route::get('/partenaires/create', [PartenaireController::class, 'create'])->name('partenaires.create');

    // Enregistrer une nouvelle ressource
    Route::post('/partenaires', [PartenaireController::class, 'store'])->name('partenaires.store');

    // Afficher les détails d'une ressource
    Route::get('/partenaires/{partenaire}', [PartenaireController::class, 'show'])->name('partenaires.show');

    // Afficher le formulaire d'édition
    Route::get('/partenaires/{partenaire}/edit', [PartenaireController::class, 'edit'])->name('partenaires.edit');

    // Mettre à jour une ressource
    Route::put('/partenaires/{partenaire}', [PartenaireController::class, 'update'])->name('partenaires.update');
});

// Route de suppression réservée aux administrateurs
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::delete('/partenaires/{partenaire}', [PartenaireController::class, 'destroy'])->name('partenaires.destroy');
});








require __DIR__.'/auth.php';
