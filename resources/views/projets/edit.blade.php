<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier du Projet') }}
        </h2>
    </x-slot>

   
    <x-membres-card>
        <!-- Message de réussite -->
        @if (session()->has('message'))
            <div class="mt-3 mb-4 list-disc list-inside text-sm text-green-600">
                {{ session('message') }}
            </div>
        @endif

        <form action="{{ route('projets.update', $projet->id) }}" method="post">
            @csrf
            @method('put')

			  <div>
				   <x-input-label for="id_membre" :value="__('id_membre')" />
				<select name="id_membre" id="id_membre" class="block mt-1 w-full" required>
				<option value="">Sélectionnez un membre</option>
				@foreach($membres as $membre)
				<option value="{{ $membre->id }}" {{ (old('id_membre', $projet->id_membre) == $membre->id) ? 'selected' : '' }}>
				{{ $membre->Nom_membre }} {{ $membre->Prenom_membre }}
                </option>
				@endforeach
				</select>
            </div>
			
			
			  <!--  nom du projet -->
            <div>
                <x-input-label for="Nom_projet" :value="__('Nom du Projet')" />

                <x-text-input id="Nom_projet" class="block mt-1 w-full" type="text" name="Nom_projet" :value="old('Nom_projet', $projet->Nom_projet)" required autofocus />
            
                <x-input-error :messages="$errors->get('Nom_projet')" class="mt-2" />
            </div>
			
			
			  <!--  Description  -->
            <div>
                <x-input-label for="Description" :value="__('Description du Projet')" />

				 <x-textarea class="block mt-1 w-full" id="description" name="description">{{ old('Description', $projet->Description) }}</x-textarea>
            
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>
			
			
			
			 <!--  date debut  -->
            <div>
                <x-input-label for="Date_debut" :value="__('Date Debut')" />

                <x-text-input id="Date_debut" class="block mt-1 w-full" type="Date" name="Date_debut" value="{{ $projet->Date_debut }}" required autofocus />
            
                <x-input-error :messages="$errors->get('Date_debut')" class="mt-2" />
            </div>
			
			
						 <!--  date_fin  -->
            <div>
                <x-input-label for="Date_fin" :value="__('Date fin ')" />

                <x-text-input id="Date_fin" class="block mt-1 w-full" type="Date" name="Date_fin" value="{{ $projet->Date_fin }}" required autofocus />
            
                <x-input-error :messages="$errors->get('Date_fin')" class="mt-2" />
            </div>
			
			
			
			  <div>
			  
				 <x-input-label for="Status_projet" :value="__('Statut Projet')" />
				<select name="Status_projet" id="Status_projet" class="block mt-1 w-full" required>
						
						<option value="{{ $projet->Status_projet }}" disabled @if(old('Status_projet') == '') selected @endif>{{ $projet->Status_projet }}</option>
					  <option value="En attente" @if(old('Status_projet') == 'En attente') selected @endif>En attente</option>
					 <option value="En cours" @if(old('Status_projet') == 'En cours') selected @endif>En cours</option>
					 <option value="Terminé" @if(old('Status_projet') == 'Terminé') selected @endif>Terminé</option>
				</select>
             @if($errors->has('Status_projet'))
			<span class="text-red-500">{{ $errors->first('Status_projet') }}</span>
			@endif
            </div>	
			
		

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-3">
                    {{ __('Send') }}
                </x-primary-button>
            </div>
        </form>

    </x-membres-card>
</x-app-layout>