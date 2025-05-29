<x-app-layout>
    <x-slot name="header" class="slot1">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" >
            {{ __('Ajouter Un Projet') }}
        </h2>
    </x-slot>

    <x-membres-card>

        <!-- Message de réussite -->
        @if (session()->has('message'))
            <div class="mt-3 mb-4 list-disc list-inside text-sm text-green-600">
                {{ session('message') }}
            </div>
        @endif

        <form action="{{ route('projets.store') }}" method="post">

            @csrf
		 
		       	 <!--  Membre   -->
            <div>
			  
				   <x-input-label for="id_membre" :value="__('Responsable Projet')" />
				<select name="id_membre" id="id_membre" class="block mt-1 w-full" required>
				<option value="">Sélectionnez un membre</option>
				@foreach($membres as $membre)
				<option value="{{ $membre->id }}">{{ $membre->Nom_membre }} {{ $membre->Prenom_membre }}</option>
				@endforeach
				</select>
              
            </div>	
			
			
			 <!--  Nom du Projet  -->
            <div>
                <x-input-label for="Nom_projet" :value="__('Nom Projet')" />

                <x-text-input  id="Nom_projet" class="block mt-1 w-full" type="text" name="Nom_projet" :value="old('Nom_projet')" required autofocus />

                <x-input-error :messages="$errors->get('Nom_projet')" class="mt-2" />
            </div>
			
			
			<!--  Description  Projet  -->
            <div>
                <x-input-label for="Descrption" :value="__('Description  Projet')" />
				
				<x-textarea class="block mt-1 w-full" id="description" name="description">{{ old('Description') }}</x-textarea>

                <x-input-error :messages="$errors->get('Description')" class="mt-2" />
            </div>

          
			
			
			  <!--  Date debut  -->
            <div>
                <x-input-label for="date_debut" :value="__('Date Debut')" />

                <x-text-input  id="date_debut" class="block mt-1 w-full" type="Date" name="date_debut" :value="old('date_debut')" required autofocus />

                <x-input-error :messages="$errors->get('date_debut')" class="mt-2" />
            </div>
			
			
			  <!--  Date fin  -->
            <div>
                <x-input-label for="date_fin" :value="__('Date Fin')" />

                <x-text-input  id="date_fin" class="block mt-1 w-full" type="Date" name="date_fin" :value="old('date_fin')" required autofocus />

                <x-input-error :messages="$errors->get('date_fin')" class="mt-2" />
            </div>
			
			
					       	 <!--  Status du Projet   -->
            <div>
			  
				   <x-input-label for="Status_projet" :value="__('Statut Projet')" />
			<select name="Status_projet" id="Status_projet" class="block mt-1 w-full" required>
					
					<option value="" disabled @if(old('Status_projet') == '') selected @endif>Sélectionnez un Statut Projet</option>
			      <option value="(En attente" @if(old('Status_projet') == '(En attente') selected @endif>(En attente</option>
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