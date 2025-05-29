<?php

namespace App\Livewire;

use Livewire\Component;

class MembreCreate extends Component
{
	
    public $nom_membre;
    public $prenom_membre;
    public $contact_membre;
    public $status;
    public $date_adhesion;
    public $successMessage = '';
	
	    protected $rules = [
        'nom_membre' => 'required',
        'prenom_membre' => 'required',
        'contact_membre' => 'required',
        'status' => 'required',
        'date_adhesion' => 'required|date',
    ];
	
	 public function save()
    {
        $this->validate();

        Membre::create([
            'Nom_membre' => $this->nom_membre,
            'Prenom_membre' => $this->prenom_membre,
            'contact_membre' => $this->contact_membre,
            'Status' => $this->status,
            'Date_adhesion' => $this->date_adhesion,
        ]);

        $this->reset(['nom_membre', 'prenom_membre', 'contact_membre', 'status', 'date_adhesion']);
        $this->successMessage = 'Le membre a bien été créé !';
    }
	
    public function render()
    {
        return view('livewire.membre-create');
    }
}
