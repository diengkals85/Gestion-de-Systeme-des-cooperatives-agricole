<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier a membre') }}
        </h2>
    </x-slot>

   
    <x-membres-card>
        <!-- Message de réussite -->
        @if (session()->has('message'))
            <div class="mt-3 mb-4 list-disc list-inside text-sm text-green-600">
                {{ session('message') }}
            </div>
        @endif

        <form action="{{ route('membres.update', $membre->id) }}" method="post">
            @csrf
            @method('put')

          
			  <!--  Nom du membre  -->
            <div>
                <x-input-label for="nom_membre" :value="__('Nom du Membre')" />

                <x-text-input id="nom_membre" class="block mt-1 w-full" type="text" name="nom_membre" :value="old('nom_membre', $membre->Nom_membre)" required autofocus />
            
                <x-input-error :messages="$errors->get('nom_membre')" class="mt-2" />
            </div>
			
			
			  <!--  prenom du membre  -->
            <div>
                <x-input-label for="prenom_membre" :value="__('Prenom du Membre')" />

                <x-text-input id="prenom_membre" class="block mt-1 w-full" type="text" name="prenom_membre" :value="old('prenom_membre', $membre->Prenom_membre)" required autofocus />
            
                <x-input-error :messages="$errors->get('prenom_membre')" class="mt-2" />
            </div>
			
			
			
			 <!--  Contact du membre  -->
            <div>
                <x-input-label for="contact_membre" :value="__('Contact Membre')" />

                <x-text-input id="contact_membre" class="block mt-1 w-full" type="text" name="contact_membre" :value="old('contact_membre', $membre->contact_membre)" required autofocus />
            
                <x-input-error :messages="$errors->get('contact_membre')" class="mt-2" />
            </div>
			
			
			
			
			 <!--  status du membre  -->
            <div>
                <x-input-label for="status" :value="__('Status')" />
				<select name="status" id="Status" class="block mt-1 w-full" required>
						
					 <option value="{{ $membre->Status }}" disabled @if(old('Status') == '') selected @endif>{{ $membre->Status }}</option>
					  <option value="Actif" @if(old('Status') == 'Actif') selected @endif>Actif</option>
					  <option value="Inactif" @if(old('Status') == 'Inactif') selected @endif>Inactif</option>
				      <option value="Suspendu" @if(old('Status') == 'Suspendu') selected @endif>Suspendu</option>
				
				</select>
             @if($errors->has('Status'))
			<span class="text-red-500">{{ $errors->first('Status') }}</span>
			@endif
				
                <x-input-error :messages="$errors->get('status')" class="mt-2" />
            </div>
			
			 <!--  date_adhesion du membre  -->
            <div>
                <x-input-label for="date_adhesion" :value="__('Date Adhesion')" />

                <x-text-input id="date_adhesion" class="block mt-1 w-full" type="date" name="date_adhesion" :value="old('date_adhesion', $membre->Date_adhesion)" required autofocus />
				
				
				
            
                <x-input-error :messages="$errors->get('date_adhesion')" class="mt-2" />
            </div>
			

          


            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-3">
                    {{ __('METTRE A JOUR') }}
                </x-primary-button>
            </div>
        </form>

    </x-membres-card>
</x-app-layout>