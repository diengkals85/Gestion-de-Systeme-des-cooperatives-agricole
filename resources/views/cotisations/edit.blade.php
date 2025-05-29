<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier la  cotisation') }}
        </h2>
    </x-slot>

   
    <x-membres-card>
        <!-- Message de réussite -->
        @if (session()->has('message'))
            <div class="mt-3 mb-4 list-disc list-inside text-sm text-green-600">
                {{ session('message') }}
            </div>
        @endif

        <form action="{{ route('cotisations.update', $cotisation->id) }}" method="post">
            @csrf
            @method('put')

			  <div>
				   <x-input-label for="id_membre" :value="__('id_membre')" />
				<select name="id_membre" id="id_membre" class="block mt-1 w-full" required>
				<option value="">Sélectionnez un membre</option>
				@foreach($membres as $membre)
				<option value="{{ $membre->id }}" {{ (old('id_membre', $cotisation->id_membre) == $membre->id) ? 'selected' : '' }}>
				{{ $membre->Nom_membre }} {{ $membre->Prenom_membre }}
                </option>
				@endforeach
				</select>
            </div>
			
			
			  <!--  montant de la cotisation -->
            <div>
                <x-input-label for="montant" :value="__('montant')" />

                <x-text-input id="montant" class="block mt-1 w-full" type="text" name="montant" :value="old('montant', $cotisation->Montant)" required autofocus />
            
                <x-input-error :messages="$errors->get('montant')" class="mt-2" />
            </div>
			
			
			
			 <!--  date_cotisation de la  cotisation  -->
            <div>
                <x-input-label for="date_cotisation" :value="__('date_cotisation')" />

                <x-text-input id="date_cotisation" class="block mt-1 w-full" type="Date" name="date_cotisation" value="{{ $cotisation->Date_cotisation }}" required autofocus />
            
                <x-input-error :messages="$errors->get('date_cotisation')" class="mt-2" />
            </div>
		

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-3">
                    {{ __('Send') }}
                </x-primary-button>
            </div>
        </form>

    </x-membres-card>
</x-app-layout>