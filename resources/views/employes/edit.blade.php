<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier l Employe') }}
        </h2>
    </x-slot>

   
    <x-membres-card>
        <!-- Message de réussite -->
        @if (session()->has('message'))
            <div class="mt-3 mb-4 list-disc list-inside text-sm text-green-600">
                {{ session('message') }}
            </div>
        @endif

        <form action="{{ route('employes.update', $employe->id) }}" method="post">
            @csrf
            @method('put')

			  <div>
				   <x-input-label for="id_cooperative" :value="__('Nom de la Cooperative')" />
				<select name="id_cooperative" id="id_cooperative" class="block mt-1 w-full" required>
				<option value="">Sélectionnez une Cooperative</option>
				@foreach($cooperatives as $cooperative)
				<option value="{{ $cooperative->id }}" {{ (old('id_cooperative', $employe->id_cooperative) == $employe->id) ? 'selected' : '' }}>
				{{ $cooperative->nom_cooperative }} 
                </option>
				@endforeach
				</select>
            </div>

			  <!--  Nom -->
            <div>
                <x-input-label for="nom" :value="__('Nom')" />

                <x-text-input id="nom" class="block mt-1 w-full" type="text" name="nom" :value="old('nom', $employe->nom)" required autofocus />
            
                <x-input-error :messages="$errors->get('nom')" class="mt-2" />
            </div>
			
			  <!--  Prenom  -->
            <div>
                <x-input-label for="prenom" :value="__('Prenom')" />

                <x-text-input id="prenom" class="block mt-1 w-full" type="text" name="prenom" :value="old('prenom', $employe->prenom)" required autofocus />
            
                <x-input-error :messages="$errors->get('prenom')" class="mt-2" />
            </div>
			
			   <!--  Poste  -->
            <div>
                <x-input-label for="poste" :value="__('Poste')" />

                <x-text-input id="poste" class="block mt-1 w-full" type="text" name="poste" :value="old('poste', $employe->poste)" required autofocus />
            
                <x-input-error :messages="$errors->get('poste')" class="mt-2" />
            </div>
			
			 <!--  Salaire  -->
            <div>
                <x-input-label for="salaire" :value="__('Salaire')" />

                <x-text-input id="salaire" class="block mt-1 w-full" type="number" name="salaire" :value="old('salaire', $employe->salaire)" required autofocus />
            
                <x-input-error :messages="$errors->get('salaire')" class="mt-2" />
            </div>
			
			 <!--  Date Embauche  -->
            <div>
                <x-input-label for="date_embauche" :value="__('Date Embauche')" />

                <x-text-input id="date_embauche" class="block mt-1 w-full" type="Date" name="date_embauche" :value="old('date_embauche', $employe->date_embauche)" required autofocus />
            
                <x-input-error :messages="$errors->get('date_embauche')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-3">
                    {{ __('METTRE A JOUR  ') }}
                </x-primary-button>
            </div>
        </form>

    </x-membres-card>
</x-app-layout>