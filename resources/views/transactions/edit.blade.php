<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier la Transaction') }}
        </h2>
    </x-slot>

   
    <x-membres-card>
        <!-- Message de réussite -->
        @if (session()->has('message'))
            <div class="mt-3 mb-4 list-disc list-inside text-sm text-green-600">
                {{ session('message') }}
            </div>
        @endif

        <form action="{{ route('transactions.update', $transaction->id) }}" method="post">
            @csrf
            @method('put')

			  <div>
				   <x-input-label for="id_cooperative" :value="__('Nom de la Cooperative')" />
				<select name="id_cooperative" id="id_cooperative" class="block mt-1 w-full" required>
				<option value="">Sélectionnez une Cooperative</option>
				@foreach($cooperatives as $cooperative)
				<option value="{{ $cooperative->id }}" {{ (old('id_cooperative', $transaction->id_cooperative) == $cooperative->id) ? 'selected' : '' }}>
				{{ $cooperative->nom_cooperative }} 
                </option>
				@endforeach
				</select>
            </div>
			
			
			 <!--  Type Transaction  -->
            <div>
                <x-input-label for="type_transaction" :value="__('Type  Transaction')" />
				<select name="type_transaction" id="type_transaction" class="block mt-1 w-full" required>
						
					 <option value="{{ $transaction->type_transaction }}" disabled @if(old('type_transaction') == '') selected @endif>{{ $transaction->type_transaction }}</option>
					  <option value="Entree" @if(old('type_transaction') == 'Entree') selected @endif>Entree</option>
					  <option value="Sortie" @if(old('type_transaction') == 'Sortie') selected @endif>Sortie</option>
				</select>
             @if($errors->has('Status'))
			<span class="text-red-500">{{ $errors->first('type_transaction') }}</span>
			@endif
				
                <x-input-error :messages="$errors->get('type_transaction')" class="mt-2" />
            </div>
			
			
			<!--  Montant -->
            <div>
                <x-input-label for="montant" :value="__('Montant de la Transaction')" />

                <x-text-input id="montant" class="block mt-1 w-full" type="text" name="montant" :value="old('montant', $transaction->montant)" required autofocus />
            
                <x-input-error :messages="$errors->get('nom_ressource')" class="mt-2" />
            </div>
			
			
			 <!--  Description  -->
            <div>
                <x-input-label for="description" :value="__('description')" />

				 <x-textarea class="block mt-1 w-full" id="description" name="description">{{ old('description', $transaction->description) }}</x-textarea>
            
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>
			
		
						  <!--  Date de la transaction- -->
            <div>
                <x-input-label for="date_transaction" :value="__('Date de la transction')" />

                <x-text-input id="date_transaction" class="block mt-1 w-full" type="date" name="date_transaction" :value="old('date_transaction', $transaction->date_transaction)" required autofocus />
            
                <x-input-error :messages="$errors->get('date_transaction')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-3">
                    {{ __('METTRE A JOUR  ') }}
                </x-primary-button>
            </div>
        </form>

    </x-membres-card>
</x-app-layout>