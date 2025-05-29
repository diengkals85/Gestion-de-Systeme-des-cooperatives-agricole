<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier le Produit') }}
        </h2>
    </x-slot>

   
    <x-membres-card>
        <!-- Message de réussite -->
        @if (session()->has('message'))
            <div class="mt-3 mb-4 list-disc list-inside text-sm text-green-600">
                {{ session('message') }}
            </div>
        @endif

        <form action="{{ route('produits.update', $produit->id) }}" method="post">
            @csrf
            @method('put')

			  <div>
				   <x-input-label for="id_membre" :value="__('Nom du Membre')" />
				<select name="id_membre" id="id_membre" class="block mt-1 w-full" required>
				<option value="">Sélectionnez un membre</option>
				@foreach($membres as $membre)
				<option value="{{ $membre->id }}" {{ (old('id_membre', $produit->id_membre) == $membre->id) ? 'selected' : '' }}>
				{{ $membre->Nom_membre }} {{ $membre->Prenom_membre }}
                </option>
				@endforeach
				</select>
            </div>
			
			
			  <!--  Nom_produit -->
            <div>
                <x-input-label for="Nom_produit" :value="__('Nom du Produit')" />

                <x-text-input id="Nom_produit" class="block mt-1 w-full" type="text" name="Nom_produit" :value="old('Nom_produit', $produit->Nom_produit)" required autofocus />
            
                <x-input-error :messages="$errors->get('Nom_produit')" class="mt-2" />
            </div>
			
			  <!--  Quantite  produit -->
            <div>
                <x-input-label for="quantite" :value="__('Quantite Disponible Produit')" />

                <x-text-input id="quantite" class="block mt-1 w-full" type="number" name="quantite" :value="old('quantite', $produit->quantite)" required autofocus />
            
                <x-input-error :messages="$errors->get('quantite')" class="mt-2" />
            </div>

              <!--  Quantite Iniitale produit -->
              <div>
                <x-input-label for="quantite_iniitale" :value="__('Quantite Produit')" />

                <x-text-input id="quantite_iniitale" class="block mt-1 w-full" type="number" name="quantite_iniitale" :value="old('quantite_iniitale', $produit->quantite_iniitale)" required autofocus />
            
                <x-input-error :messages="$errors->get('quantite_iniitale')" class="mt-2" />
            </div>
			
			
			  <!--  Prix  produit -->
            <div>
                <x-input-label for="prix" :value="__('Prix Produit')" />

                <x-text-input id="prix" class="block mt-1 w-full" type="number" name="prix" :value="old('prix', $produit->prix)" required autofocus />
            
                <x-input-error :messages="$errors->get('prix')" class="mt-2" />
            </div>
			

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-3">
                    {{ __('METTRE A JOUR') }}
                </x-primary-button>
            </div>
        </form>

    </x-membres-card>
</x-app-layout>