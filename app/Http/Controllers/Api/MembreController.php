<?php
// app/Http/Controllers/Api/MembreController.php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Membre;
use Illuminate\Http\Request;

class MembreController extends Controller
{
    public function index()
    {
        return Membre::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nom_membre' => 'required',
            'Prenom_membre' => 'required',
            'contact_membre' => 'required',
            'Status' => 'required',
            'Date_adhesion' => 'required|date'
        ]);

        return Membre::create($request->all());
    }

    public function show(Membre $membre)
    {
        return $membre;
    }

    public function update(Request $request, Membre $membre)
    {
        $membre->update($request->all());
        return $membre;
    }

    public function destroy(Membre $membre)
    {
        $membre->delete();
        return response()->noContent();
    }
}