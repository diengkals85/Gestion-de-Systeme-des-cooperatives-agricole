<x-app-layout>
    <x-slot name="header" class="slot1">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" >
            {{ __('Ajouter Une Vente') }}
        </h2>
    </x-slot>

    <x-membres-card>

        <!-- Message de réussite -->
        @if (session()->has('message'))
            <div class="mt-3 mb-4 list-disc list-inside text-sm text-green-600">
                {{ session('message') }}
            </div>
        @endif

        <form action="{{ route('ventes.store') }}" method="post">

            @csrf
		 
		       	 <!--  Produit   -->
            <div>
			  
				   <x-input-label for="id_produit" :value="__('Libelle du Produit')" />
				<select name="id_produit" id="id_produit" class="block mt-1 w-full" required>
				<option value="">Sélectionnez un Produit</option>
				@foreach($produits as $produit)
				<option value="{{ $produit->id }}">{{ $produit->Nom_produit }}</option>
				@endforeach
				</select>
              
            </div>	
			
			
			 <div>
			  
				   <x-input-label for="id_client" :value="__('Nom du Client')" />
				<select name="id_client" id="id_client" class="block mt-1 w-full" required>
				<option value="">Sélectionnez un Client</option>
				@foreach($clients as $client)
				<option value="{{ $client->id }}">{{ $client->nom_client }}</option>
				@endforeach
				</select>
              
            </div>	
			
			
			 <!--  Quantite du Produit  -->
            <div>
                <x-input-label for="quantite" :value="__('Quantite')" />

                <x-text-input  id="quantite" class="block mt-1 w-full" type="number" name="quantite" :value="old('quantite')" required autofocus />

                <x-input-error :messages="$errors->get('quantite')" class="mt-2" />
            </div>
			
			 <!--  Prix du Produit  -->
            <div>
                <x-input-label for="prix_vente" :value="__('Prix Vente')" />

                <x-text-input  id="prix_vente" class="block mt-1 w-full" type="number" name="prix_vente" :value="old('prix_vente')" required autofocus />

                <x-input-error :messages="$errors->get('prix_vente')" class="mt-2" />
            </div>
			
			

            <!--  Date de la Vente  -->
            <div>
                <x-input-label for="date_vente" :value="__('Date de la Vente')" />

                <x-text-input  id="date_vente" class="block mt-1 w-full" type="date" name="date_vente" :value="old('date_vente')" required autofocus />

                <x-input-error :messages="$errors->get('date_vente')" class="mt-2" />
            </div>
			
			
					       	 <!--  Status de la vente   -->
            <div>
			  
				   <x-input-label for="status" :value="__('Statut de la Vente')" />
			<select name="status" id="status" class="block mt-1 w-full" required>
					
					<option value="" disabled @if(old('status') == '') selected @endif>Sélectionnez un Statut </option>
			      <option value="(En attente" @if(old('status') == '(En attente') selected @endif>(En attente</option>
			     <option value="Payé" @if(old('status') == 'Payé') selected @endif>Payé</option>
				 <option value="Annulé" @if(old('status') == 'Annulé') selected @endif>Annulé</option>
			</select>
             @if($errors->has('status'))
			<span class="text-red-500">{{ $errors->first('status') }}</span>
			@endif
            </div>	
			
			
			
				
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-3">
                    {{ __('ENREGISTRER') }}
                </x-primary-button>
            </div>
			
        </form>

    </x-membres-card>
</x-app-layout>