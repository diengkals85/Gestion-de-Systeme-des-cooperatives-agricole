<x-app-layout>
    <x-slot name="header" class="slot1">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" >
            {{ __('Ajouter Une Cotisation') }}
        </h2>
    </x-slot>

    <x-membres-card>

        <!-- Message de réussite -->
					   @if(session('success'))
					<div class="mt-3 mb-4 list-disc list-inside text-sm text-green-600" role="alert">
				     
						<strong>{{ session('success') }}</strong>
						@if(session('lien_reçu'))
							<a href="{{ session('lien_reçu') }}" class="block mt-2 text-blue-500 underline">
								Télécharger le reçu
							</a>
						@endif
					</div>
				     @endif

        <form action="{{ route('cotisations.store') }}" method="post">

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

            <!--  Montant de cotisation  -->
            <div>
                <x-input-label for="montant" :value="__('Montant')" />

                <x-text-input  id="montant" class="block mt-1 w-full" type="text" name="montant" :value="old('montant')" required autofocus />

                <x-input-error :messages="$errors->get('montant')" class="mt-2" />
            </div>
			
			
			
			  <!--  Date de cotisation  -->
            <div>
                <x-input-label for="date_cotisation" :value="__('Date cotisation')" />

                <x-text-input  id="date_cotisation" class="block mt-1 w-full" type="Date" name="date_cotisation" :value="old('date_cotisation')" required autofocus />

                <x-input-error :messages="$errors->get('date_cotisation')" class="mt-2" />
            </div>
			
		
				
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-3">
                    {{ __('ENREGISTRER') }}
                </x-primary-button>
            </div>
			
        </form>

    </x-membres-card>
</x-app-layout>