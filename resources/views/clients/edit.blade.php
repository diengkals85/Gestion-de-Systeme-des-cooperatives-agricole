<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier le Client') }}
        </h2>
    </x-slot>

   
    <x-membres-card>
        <!-- Message de réussite -->
        @if (session()->has('message'))
            <div class="mt-3 mb-4 list-disc list-inside text-sm text-green-600">
                {{ session('message') }}
            </div>
        @endif

        <form action="{{ route('clients.update', $client->id) }}" method="post">
            @csrf
            @method('put')

          
			  <!--  Nom du Client  -->
            <div>
                <x-input-label for="nom_client" :value="__('Nom du Client')" />

                <x-text-input id="nom_client" class="block mt-1 w-full" type="text" name="nom_client" :value="old('nom_client', $client->nom_client)" required autofocus />
            
                <x-input-error :messages="$errors->get('nom_client')" class="mt-2" />
            </div>
			
			
			  <!--  prenom du Client  -->
            <div>
                <x-input-label for="prenom_client" :value="__('Prenom du Client')" />

                <x-text-input id="prenom_client" class="block mt-1 w-full" type="text" name="prenom_client" :value="old('prenom_client', $client->prenom_client)" required autofocus />
            
                <x-input-error :messages="$errors->get('prenom_client')" class="mt-2" />
            </div>
			
			
			
			 <!--  Contact du Client  -->
            <div>
                <x-input-label for="contact" :value="__('Contact Client')" />

                <x-text-input id="contact" class="block mt-1 w-full" type="text" name="contact" :value="old('contact', $client->contact)" required autofocus />
            
                <x-input-error :messages="$errors->get('contact')" class="mt-2" />
            </div>
			
			 <!--  email du Client  -->
            <div>
                <x-input-label for="email" :value="__('Email Client')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $client->email)" required autofocus />
            
                <x-input-error :messages="$errors->get('contact')" class="mt-2" />
            </div>
			
				 <!--  Adresse du Client  -->
            <div>
                <x-input-label for="adresse" :value="__('Adresse Client')" />
				
				<x-textarea class="block mt-1 w-full" id="adresse" name="adresse">{{ old('adresse', $client->adresse) }}</x-textarea>

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