<x-app-layout>
    <x-slot name="header" class="slot1">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" >
            {{ __('Ajouter Une Transaction') }}
        </h2>
    </x-slot>

    <x-membres-card>

        <!-- Message de réussite -->
        @if (session()->has('message'))
            <div class="mt-3 mb-4 list-disc list-inside text-sm text-green-600">
                {{ session('message') }}
            </div>
        @endif

        <form action="{{ route('transactions.store') }}" method="post">

            @csrf
		 
		       	 <!--  Cooperative   -->
            <div>
			  
				   <x-input-label for="id_cooperative" :value="__('Nom de la Cooperative')" />
				<select name="id_cooperative" id="id_cooperative" class="block mt-1 w-full" required>
				<option value="">Sélectionnez un Cooperative</option>
				@foreach($cooperatives as $cooperative)
				<option value="{{ $cooperative->id }}"  >{{ $cooperative->nom_cooperative }}</option>
				@endforeach
				</select>
              
            </div>	
			
			 <!--  Type Transaction  -->
            <div>
                <x-input-label for="type_transaction" :value="__('Tyep Transaction')" />
			<select name="type_transaction" id="type_transaction" class="block mt-1 w-full" required>
					
					<option value="" disabled @if(old('type_transaction') == '') selected @endif>Selectionner Type Transaction </option>
			        <option value="Entree" @if(old('type_transaction') == 'type_transaction') selected @endif>Entree </option>
				    <option value="Sortie" @if(old('type_transaction') == 'type_transaction') selected @endif>Sortie </option>	
			</select>
                <x-input-error :messages="$errors->get('type_transaction')" class="mt-2" />
            </div>
			
			
			 <!--  Montant de transction -->
            <div>
                <x-input-label for="montant" :value="__('Montant Transaction')" />

                <x-text-input  id="montant" class="block mt-1 w-full" type="number" name="montant" :value="old('montant')" required autofocus />

                <x-input-error :messages="$errors->get('montant')" class="mt-2" />
            </div>
			
			
			
			 <!--  Description de la transaction  -->
            <div>
                <x-input-label for="description" :value="__('Description de la Transaction')" />
				  <x-textarea class="block mt-1 w-full" id="description" name="description">{{ old('description') }}</x-textarea>

                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>
			
			

            <!--  Date de la  Transaction  -->
            <div>
                <x-input-label for="date_transaction" :value="__('Date Transaction')" />

                <x-text-input  id="date_transaction" class="block mt-1 w-full" type="date" name="date_transaction" :value="old('date_transaction')" required autofocus />

                <x-input-error :messages="$errors->get('date_transaction')" class="mt-2" />
            </div>
				
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-3">
                    {{ __('ENREGISTRER') }}
                </x-primary-button>
            </div>
			
        </form>

    </x-membres-card>
</x-app-layout>