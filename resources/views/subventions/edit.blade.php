<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier la Subvention') }}
        </h2>
    </x-slot>

   
    <x-membres-card>
        <!-- Message de réussite -->
        @if (session()->has('message'))
            <div class="mt-3 mb-4 list-disc list-inside text-sm text-green-600">
                {{ session('message') }}
            </div>
        @endif

        <form action="{{ route('subventions.update', $subvention->id) }}" method="post">
            @csrf
            @method('put')

			  <div>
				   <x-input-label for="id_cooperative" :value="__('Nom de la Cooperative')" />
				<select name="id_cooperative" id="id_cooperative" class="block mt-1 w-full" required>
				<option value="">Sélectionnez une Cooperative</option>
				@foreach($cooperatives as $cooperative)
				<option value="{{ $cooperative->id }}" {{ (old('id_cooperative', $subvention->id_cooperative) == $cooperative->id) ? 'selected' : '' }}>
				{{ $cooperative->nom_cooperative }} 
                </option>
				@endforeach
				</select>
            </div>
			
			
			 <div>
				   <x-input-label for="id_partenaire" :value="__('Partenaire')" />
				<select name="id_partenaire" id="id_partenaire" class="block mt-1 w-full" required>
				<option value="">Sélectionnez un Partenaire</option>
				@foreach($partenaires as $partenaire)
				<option value="{{ $partenaire->id }}" {{ (old('id_partenaire', $subvention->id_partenaire) == $partenaire->id) ? 'selected' : '' }}>
				{{ $partenaire->nom_partenaire }} 
                </option>
				@endforeach
				</select>
            </div>
			
			
			  <!--  Date Reception -->
            <div>
                <x-input-label for="date_reception" :value="__('Date de Reception')" />

                <x-text-input id="date_reception" class="block mt-1 w-full" type="date" name="date_reception" :value="old('date_reception', $subvention->date_reception)" required autofocus />
            
                <x-input-error :messages="$errors->get('date_reception')" class="mt-2" />
            </div>
			
						  <!--  Montant -->
            <div>
                <x-input-label for="montant" :value="__('Montant')" />

                <x-text-input id="montant" class="block mt-1 w-full" type="number" name="montant" :value="old('montant', $subvention->montant)" required autofocus />
            
                <x-input-error :messages="$errors->get('montant')" class="mt-2" />
            </div>
			
			  <div>
                <x-input-label for="description" :value="__('Description')" />

				 <x-textarea class="block mt-1 w-full" id="description" name="description">{{ old('description', $subvention->description) }}</x-textarea>
            
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>
			
			
			
		

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-3">
                    {{ __('METTRE A JOUR  ') }}
                </x-primary-button>
            </div>
        </form>

    </x-membres-card>
</x-app-layout>