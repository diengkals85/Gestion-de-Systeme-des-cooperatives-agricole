<x-app-layout>
    <x-slot name="header" class="slot1">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" >
            {{ __('Formulaire d affection une Ressource a un Projet') }}
        </h2>
    </x-slot>

    <x-membres-card>

       <!-- Section des erreurs -->
       @if($errors->any())
            <div class="mt-3 mb-4 list-disc list-inside text-sm text-green-600">
                <h3 class="font-bold">Erreurs :</h3>
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if($errors->has('stock'))
            <div class="mt-3 mb-4 list-disc list-inside text-sm text-green-600d">
                <i class="fas fa-exclamation-triangle mr-2"></i>
                {{ $errors->first('stock') }}
            </div>
        @endif

        @if($errors->has('resource'))
            <div class="mt-3 mb-4 list-disc list-inside text-sm text-green-600">
                <i class="fas fa-box-open mr-2"></i>
                {{ $errors->first('resource') }}
            </div>
        @endif

        <!-- Message de réussite -->
        @if (session()->has('message'))
            <div class="mt-3 mb-4 list-disc list-inside text-sm text-green-600">
                {{ session('message') }}
            </div>
        @endif

        <form action="{{ route('utilisationressources.store') }}" method="post">

            @csrf
		 
		       	 <!--  Cooperative   -->
            <div>
			  
				   <x-input-label for="id_projet" :value="__('Nom du Projet')" />
				<select name="id_projet" id="id_projet" class="block mt-1 w-full" required>
				<option value="">Sélectionnez un projet</option>
				@foreach($projets as $projet)
				<option value="{{ $projet->id }}">{{ $projet->Nom_projet}}</option>
				@endforeach
				</select>
              
            </div>	
			
			
			 <div>
			  
				   <x-input-label for="id_ressource" :value="__('Ressource')" />
				<select name="id_ressource" id="id_ressource" class="block mt-1 w-full" required>
				<option value="">Sélectionnez Une Ressoruce</option>
				@foreach($ressources as $ressource)
				<option value="{{ $ressource->id }}">{{ $ressource->nom_ressource }}</option>
				@endforeach
				</select>
              
            </div>	
          <!--
			 <div>
			  
				   <x-input-label for="id_stock" :value="__('Stock')" />
				<select name="id_stock" id="id_stock" class="block mt-1 w-full" required>
				<option value="">Sélectionnez Un Stock Ressource</option>
				@foreach($stocks as $stock)
				<option value="{{ $stock->id }}">{{ $stock->ressource->nom_ressource }}</option>
				@endforeach
				</select>
            
            </div>	
			-->
			
			 <!--  Quantite Utilise  -->
            <div>
                <x-input-label for="quantite_utilise" :value="__('Quantite Utilise')" />

                <x-text-input  id="quantite_utilise" class="block mt-1 w-full" type="number" name="quantite_utilise" :value="old('quantite_utilise')" required autofocus />

                <x-input-error :messages="$errors->get('quantite_initiale')" class="mt-2" />
            </div>
			
	
			 <!--  Type de Mouvement  -->
            <div>
                <x-input-label for="type_mouvement" :value="__('Tyep Mouvement')" />
                <select name="type_mouvement" id="type_mouvement" class="block mt-1 w-full" required>
                <option value="">Sélectionner un type</option>
                <option value="Entree" @selected(old('type_mouvement') == 'Entree')>Entrée</option>
                <option value="Sortie" @selected(old('type_mouvement') == 'Sortie')>Sortie</option>
            </select>
                <x-input-error :messages="$errors->get('type_mouvement')" class="mt-2" />
            </div>
			

		
				
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-3">
                    {{ __('ENREGISTRER') }}
                </x-primary-button>
            </div>
			
        </form>

    </x-membres-card>
</x-app-layout>