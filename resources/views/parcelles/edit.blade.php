<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier une  parcelle') }}
        </h2>
    </x-slot>

   
    <x-membres-card>
        <!-- Message de réussite -->
        @if (session()->has('message'))
            <div class="mt-3 mb-4 list-disc list-inside text-sm text-green-600">
                {{ session('message') }}
            </div>
        @endif

        <form action="{{ route('parcelles.update', $parcelle->id) }}" method="post">
            @csrf
            @method('put')

			  <div>
				   <x-input-label for="id_projet" :value="__('Nom du Projet')" />
				<select name="id_projet" id="id_projet" class="block mt-1 w-full" required>
				<option value="">Sélectionnez un projet</option>
				@foreach($projets as $projet)
				<option value="{{ $projet->id }}" {{ (old('id_projet', $parcelle->id_projet) == $projet->id) ? 'selected' : '' }}>
				{{ $projet->Nom_projet }} 
                </option>
				@endforeach
				</select>
            </div>
			
			 <div>
				   <x-input-label for="id_culture" :value="__('Nom de la Culture')" />
				<select name="id_culture" id="id_culture" class="block mt-1 w-full" required>
				<option value="">Sélectionnez une  Culture</option>
				@foreach($cultures as $culture)
				<option value="{{ $culture->id }}" {{ (old('id_culture',$parcelle->id_culture) == $culture->id) ? 'selected' : '' }}>
				{{ $culture->Nom_Culture }} 
                </option>
				@endforeach
				</select>
            </div>
			
			
			  <!--  nom du Parcelle -->
            <div>
                <x-input-label for="nom_parcelle" :value="__('Nom de la  Parcelle')" />
                <x-text-input id="nom_parcelle" class="block mt-1 w-full" type="text" name="nom_parcelle" :value="old('nom_parcelle', $parcelle->nom_parcelle)" required autofocus />
                <x-input-error :messages="$errors->get('nom_parcelle')" class="mt-2" />
            </div>
			
			
			  <!--  Superficie  -->
            <div>
                <x-input-label for="superficie" :value="__('Superficie de la  Parcelle')" />
				  <x-text-input id="superficie" class="block mt-1 w-full" type="number" name="superficie" :value="old('superficie', $parcelle->superficie)" required autofocus />
                <x-input-error :messages="$errors->get('superficie')" class="mt-2" />
            </div>
			
			  <!--  localisation_gps  -->
            <div>
                <x-input-label for="localisation_gps" :value="__('localisation GPS de la  Parcelle')" />
				  <x-text-input id="localisation_gps" class="block mt-1 w-full" type="text" name="localisation_gps" :value="old('localisation_gps', $parcelle->localisation_gps)" required autofocus />
                <x-input-error :messages="$errors->get('localisation_gps')" class="mt-2" />
            </div>
			
			
			  <!--  ph_sol  -->
            <div>
                <x-input-label for="ph_sol" :value="__('PH Parcelle')" />
				  <x-text-input id="ph_sol" class="block mt-1 w-full" type="number" name="ph_sol" :value="old('ph_sol', $parcelle->ph_sol)" required autofocus />
                <x-input-error :messages="$errors->get('ph_sol')" class="mt-2" />
            </div>

			
			  <div>
			  
				   <x-input-label for="type_sol" :value="__('Type de sol ')" />
			<select name="type_sol" id="type_sol" class="block mt-1 w-full" required>
					
					<option value="{{ $parcelle->type_sol }}" disabled @if(old('type_sol') == '') selected @endif>{{ $parcelle->type_sol }}</option>
					 <option value="Sableux" @if(old('type_sol') == 'Sableux') selected @endif>Sableux</option>
			     <option value="Argileux" @if(old('type_sol') == 'Argileux') selected @endif>Argileux</option>
				  <option value="Limoneux" @if(old('type_sol') == 'Limoneux') selected @endif>Limoneux</option>
				   <option value="Humifère" @if(old('type_sol') == 'Humifère') selected @endif>Humifère</option>
			     
			</select>
             @if($errors->has('Status_projet'))
			<span class="text-red-500">{{ $errors->first('type_sol') }}</span>
			@endif
            </div>	
			
		      <div>
                <x-input-label for="rendement" :value="__('Rendemment')" />
                <x-text-input id="rendement" class="block mt-1 w-full" type="number" name="rendement" :value="old('rendement', $parcelle->rendement)" required autofocus />
                <x-input-error :messages="$errors->get('rendement')" class="mt-2" />
            </div>
			
			<div>
			
				<x-input-label for="latitude" :value="__('Latitude ')" />
				<input type="text" name="latitude" id="latitude" class="block mt-1 w-full" value="{{ $parcelle->latitude }}" required>
			</div>
			<div>
				
				<x-input-label for="longitude" :value="__('Longitude ')" />
				<input type="text" name="longitude" id="longitude" class="block mt-1 w-full" value="{{ $parcelle->longitude }}" required>
			</div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-3">
                    {{ __('METTRE A JOUR') }}
                </x-primary-button>
            </div>
        </form>

    </x-membres-card>
</x-app-layout>