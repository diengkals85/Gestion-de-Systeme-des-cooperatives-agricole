<x-app-layout>
    <x-slot name="header" class="slot1">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" >
            {{ __('Ajouter Un Produit') }}
        </h2>
    </x-slot>

    <x-membres-card>

        <!-- Message de réussite -->
        @if (session()->has('message'))
            <div class="mt-3 mb-4 list-disc list-inside text-sm text-green-600">
                {{ session('message') }}
            </div>
        @endif

        <form action="{{ route('produits.store') }}" method="post">

            @csrf
		 
		       	 <!--  Membre   -->
            <div>
			  
				   <x-input-label for="id_membre" :value="__('Nom du Membre')" />
				<select name="id_membre" id="id_membre" class="block mt-1 w-full" required>
				<option value="">Sélectionnez un membre</option>
				@foreach($membres as $membre)
				<option value="{{ $membre->id }}">{{ $membre->Nom_membre }} {{ $membre->Prenom_membre }}</option>
				@endforeach
				</select>
              
            </div>	

            <!--  Nom Produit  -->
            <div>
                <x-input-label for="Nom_produit" :value="__('Libelle du Produit')" />

                <x-text-input  id="Nom_produit" class="block mt-1 w-full" type="text" name="Nom_produit" :value="old('Nom_produit')" required autofocus />

                <x-input-error :messages="$errors->get('Nom_produit')" class="mt-2" />
            </div>
			
			
			
			  <!--  Quantite du Produit  -->
            <div>
                <x-input-label for="quantite" :value="__('Quantite Disponible du Produit')" />

                <x-text-input  id="quantite" class="block mt-1 w-full" type="number" name="quantite" :value="old('quantite')" required autofocus />

                <x-input-error :messages="$errors->get('quantite')" class="mt-2" />
            </div>

              <!--  Quantite Initiale  du Produit  -->
              <div>
                <x-input-label for="quantite_initiale" :value="__('Quantite Initiale du Produit')" />

                <x-text-input  id="quantite_initiale" class="block mt-1 w-full" type="number" name="quantite_initiale" :value="old('quantite_initiale')" required autofocus />

                <x-input-error :messages="$errors->get('quantite_initiale')" class="mt-2" />
            </div>
			
			  <!--  Prix du Produit  -->
            <div>
                <x-input-label for="prix" :value="__('Prix du Produit')" />

                <x-text-input  id="prix" class="block mt-1 w-full" type="number" name="prix" :value="old('prix')" required autofocus />

                <x-input-error :messages="$errors->get('prix')" class="mt-2" />
            </div>
			
		
				
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-3">
                    {{ __('ENREGISTRER') }}
                </x-primary-button>
            </div>
			
        </form>

    </x-membres-card>
</x-app-layout>