<x-app-layout>
    <x-slot name="header" class="slot1">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" >
            {{ __('Ajouter Un Nouveau Client') }}
        </h2>
    </x-slot>

    <x-membres-card>

        <!-- Message de réussite -->
        @if (session()->has('message'))
            <div class="mt-3 mb-4 list-disc list-inside text-sm text-green-600">
                {{ session('message') }}
            </div>
        @endif

        <form action="{{ route('clients.store') }}" method="post">

            @csrf
		 
			

            <!--  Nom du client  -->
            <div>
                <x-input-label for="nom_client" :value="__('Nom du client')" />

                <x-text-input  id="nom_client" class="block mt-1 w-full" type="text" name="nom_client" :value="old('nom_client')" required autofocus />

                <x-input-error :messages="$errors->get('nom_client')" class="mt-2" />
            </div>
			
			 <!--  Prenom du client  -->
            <div>
                <x-input-label for="prenom_client" :value="__('Prenom du client')" />

                <x-text-input  id="prenom_client" class="block mt-1 w-full" type="text" name="prenom_client" :value="old('prenom_client')" required autofocus />

                <x-input-error :messages="$errors->get('prenom_client')" class="mt-2" />
            </div>
			
			
			 <!--  Contact du Client  -->
            <div>
                <x-input-label for="contact" :value="__('Contact Client')" />

                <x-text-input  id="contact" class="block mt-1 w-full" type="text" name="contact" :value="old('contact')" required autofocus />

                <x-input-error :messages="$errors->get('contact')" class="mt-2" />
            </div>
			
			
			 <!--  Email Client  -->
            <div>
                <x-input-label for="email" :value="__('Email Client')" />

                <x-text-input  id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
			
			
			 <!--  Adresse Client  -->
            <div>
                <x-input-label for="adresse" :value="__('Adresse Client')" />
				 <x-textarea class="block mt-1 w-full" id="adresse" name="adresse">{{ old('adresse') }}</x-textarea>

                <x-input-error :messages="$errors->get('adresse')" class="mt-2" />
            </div>
			
		


           
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-3">
                    {{ __('ENREGISTRER') }}
                </x-primary-button>
            </div>
			
        </form>

    </x-membres-card>
</x-app-layout>