<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier un Partenaire') }}
        </h2>
    </x-slot>

   
    <x-membres-card>
        <!-- Message de réussite -->
        @if (session()->has('message'))
            <div class="mt-3 mb-4 list-disc list-inside text-sm text-green-600">
                {{ session('message') }}
            </div>
        @endif

        <form action="{{ route('partenaires.update', $partenaire->id) }}" method="post">
            @csrf
            @method('put')

          
			  <!--  Nom du membre  -->
            <div>
                <x-input-label for="nom_partenaire" :value="__('Nom Partenaire')" />

                <x-text-input id="nom_partenaire" class="block mt-1 w-full" type="text" name="nom_partenaire" :value="old('nom_partenaire', $partenaire->nom_partenaire)" required autofocus />
            
                <x-input-error :messages="$errors->get('nom_partenaire')" class="mt-2" />
            </div>
			
			
			  <!--  prenom du membre  -->
            <div>
                <x-input-label for="contact" :value="__('Contact du Partenaire')" />

                <x-text-input id="contact" class="block mt-1 w-full" type="text" name="contact" :value="old('contact', $partenaire->contact)" required autofocus />
            
                <x-input-error :messages="$errors->get('contact')" class="mt-2" />
            </div>
			
			
			
			 <!--  Contact du membre  -->
            <div>
                <x-input-label for="email" :value="__('Email du Partenaire')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $partenaire->email)" required autofocus />
            
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
			
			
			
			
			 <!--  Type de partenaire  -->
            <div>
                <x-input-label for="type_partenaire" :value="__('Type de Partenaire')" />
				<select name="type_partenaire" id="type_partenaire" class="block mt-1 w-full" required>
						
					 <option value="{{ $partenaire->type_partenaire }}" disabled @if(old('type_partenaire') == '') selected @endif>{{ $partenaire->type_partenaire }}</option>
					  <option value="ONG" @if(old('type_partenaire') == 'type_partenaire') selected @endif>ONG</option>
					  <option value="Gouvernement" @if(old('type_partenaire') == 'Gouvernement') selected @endif>Gouvernement</option>
				      <option value="Entreprise" @if(old('type_partenaire') == 'Entreprise') selected @endif>Entreprise</option>
					  <option value="Autre" @if(old('type_partenaire') == 'Entreprise') selected @endif>Autre</option>
				
				</select>
             @if($errors->has('Status'))
			<span class="text-red-500">{{ $errors->first('type_partenaire') }}</span>
			@endif
				
                <x-input-error :messages="$errors->get('type_partenaire')" class="mt-2" />
            </div>
			
			 <!--  date_adhesion du membre  -->
            <div>
                <x-input-label for="adresse" :value="__('Adresse du Partenaire')" />

				 <x-textarea class="block mt-1 w-full" id="adresse" name="adresse">{{ old('adresse', $partenaire->adresse) }}</x-textarea>
            
                <x-input-error :messages="$errors->get('adresse')" class="mt-2" />
            </div>
			

          


            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-3">
                    {{ __('METTRE A JOUR') }}
                </x-primary-button>
            </div>
        </form>

    </x-membres-card>
</x-app-layout>