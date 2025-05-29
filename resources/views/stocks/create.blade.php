<x-app-layout>
    <x-slot name="header" class="slot1">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" >
            {{ __('Ajouter Un Stock') }}
        </h2>
    </x-slot>

    <x-membres-card>

        <!-- Message de réussite -->
        @if (session()->has('message'))
            <div class="mt-3 mb-4 list-disc list-inside text-sm text-green-600">
                {{ session('message') }}
            </div>
        @endif

        <form action="{{ route('stocks.store') }}" method="post">

            @csrf
		 
		       	 <!--  Cooperative   -->
            <div>
			  
				   <x-input-label for="id_cooperative" :value="__('Nom de la Cooperative')" />
				<select name="id_cooperative" id="id_cooperative" class="block mt-1 w-full" required>
				<option value="">Sélectionnez un Cooperative</option>
				@foreach($cooperatives as $cooperative)
				<option value="{{ $cooperative->id }}">{{ $cooperative->nom_cooperative }}</option>
				@endforeach
				</select>
              
            </div>	
			
			
			 <div>
			  
				   <x-input-label for="id_ressource" :value="__('Ressource')" />
				<select name="id_ressource" id="id_ressource" class="block mt-1 w-full" required>
				<option value="">Sélectionnez Une Ressoruce</option>
				@foreach($ressources as $ressource)
				<option value="{{ $ressource->id }}">{{ $ressource->nom_ressource }}</option>
				@endforeach
				</select>
              
            </div>	
			
			
			 <!--  Nom  de la Ressource  -->
            <div>
                <x-input-label for="quantite_initiale" :value="__('Quantite initiale')" />

                <x-text-input  id="quantite_initiale" class="block mt-1 w-full" type="number" name="quantite_initiale" :value="old('quantite_initiale')" required autofocus />

                <x-input-error :messages="$errors->get('quantite_initiale')" class="mt-2" />
            </div>
			
			

            <!--  Quantite  -->
            <div>
                <x-input-label for="quantite_disponible" :value="__('Quantite Disponible')" />

                <x-text-input  id="quantite_disponible" class="block mt-1 w-full" type="number" name="quantite_disponible" :value="old('quantite_disponible')" required autofocus />

                <x-input-error :messages="$errors->get('quantite_disponible')" class="mt-2" />
            </div>
			
			
			 <!--  Seuil Alerte  -->
            <div>
                <x-input-label for="seuil_alerte" :value="__('Quantite seuil Alerte')" />

                <x-text-input  id="seuil_alerte" class="block mt-1 w-full" type="number" name="seuil_alerte" :value="old('seuil_alerte')" required autofocus />

                <x-input-error :messages="$errors->get('seuil_alerte')" class="mt-2" />
            </div>
				
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-3">
                    {{ __('ENREGISTRER') }}
                </x-primary-button>
            </div>
			
        </form>

    </x-membres-card>
</x-app-layout>