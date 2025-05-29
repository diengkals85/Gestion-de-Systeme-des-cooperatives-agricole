<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier la Ressource') }}
        </h2>
    </x-slot>

   
    <x-membres-card>
        <!-- Message de réussite -->
        @if (session()->has('message'))
            <div class="mt-3 mb-4 list-disc list-inside text-sm text-green-600">
                {{ session('message') }}
            </div>
        @endif

        <form action="{{ route('ressources.update', $ressource->id) }}" method="post">
            @csrf
            @method('put')

			  <div>
				   <x-input-label for="id_cooperative" :value="__('Nom de la Cooperative')" />
				<select name="id_cooperative" id="id_cooperative" class="block mt-1 w-full" required>
				<option value="">Sélectionnez une Cooperative</option>
				@foreach($cooperatives as $cooperative)
				<option value="{{ $cooperative->id }}" {{ (old('id_cooperative', $ressource->id_cooperative) == $cooperative->id) ? 'selected' : '' }}>
				{{ $cooperative->nom_cooperative }} 
                </option>
				@endforeach
				</select>
            </div>
			
			
			 <div>
				   <x-input-label for="id_type" :value="__('Type de la Ressource')" />
				<select name="id_type" id="id_type" class="block mt-1 w-full" required>
				<option value="">Sélectionnez Type Ressource</option>
				@foreach($typeressources as $typeressource)
				<option value="{{ $typeressource->id }}" {{ (old('id_type', $ressource->id_type) == $typeressource->id) ? 'selected' : '' }}>
				{{ $typeressource->type }} 
                </option>
				@endforeach
				</select>
            </div>
			
			
			  <!--  Nom de la  Ressource -->
            <div>
                <x-input-label for="nom_ressource" :value="__('Nom de la Ressource')" />

                <x-text-input id="nom_ressource" class="block mt-1 w-full" type="text" name="nom_ressource" :value="old('nom_ressource', $ressource->nom_ressource)" required autofocus />
            
                <x-input-error :messages="$errors->get('nom_ressource')" class="mt-2" />
            </div>
			
						  <!--  Nom de la  Ressource -->
            <div>
                <x-input-label for="Qte_ressource" :value="__('Quantite  de la Ressource')" />

                <x-text-input id="Qte_ressource" class="block mt-1 w-full" type="number" name="Qte_ressource" :value="old('Qte_ressource', $ressource->Qte_ressource)" required autofocus />
            
                <x-input-error :messages="$errors->get('Qte_ressource')" class="mt-2" />
            </div>
			
			
			
		

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-3">
                    {{ __('METTRE A JOUR  ') }}
                </x-primary-button>
            </div>
        </form>

    </x-membres-card>
</x-app-layout>