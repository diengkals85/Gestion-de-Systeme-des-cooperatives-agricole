<x-app-layout>
    <x-slot name="header" class="slot1">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" >
            {{ __('Create a Cooperative') }}
        </h2>
    </x-slot>

    <x-membres-card>

        <!-- Message de réussite -->
        @if (session()->has('message'))
            <div class="mt-3 mb-4 list-disc list-inside text-sm text-green-600">
                {{ session('message') }}
            </div>
        @endif

        <form action="{{ route('cooperatives.store') }}" method="post">

            @csrf
		 
			

            <!--  Nom du nom_Cooperative  -->
            <div>
                <x-input-label for="nom_cooperative" :value="__('Nom de la Cooperative')" />

                <x-text-input  id="nom_cooperative" class="block mt-1 w-full" type="text" name="nom_cooperative" :value="old('nom_cooperative')" required autofocus />

                <x-input-error :messages="$errors->get('nom_cooperative')" class="mt-2" />
            </div>
			
			 <!--   ADRESSE  -->
            <div>
                <x-input-label for="adresse" :value="__('Adresse de la  Cooperative')" />
				<x-textarea class="block mt-1 w-full" id="adresse" name="adresse">{{ old('adresse') }}</x-textarea>

                <x-input-error :messages="$errors->get('adresse')" class="mt-2" />
            </div>
			
		
			
			
			 <!--  Date de Creation  -->
            <div>
                <x-input-label for="date_creation" :value="__('Date de Creation')" />

                <x-text-input  id="date_creation" class="block mt-1 w-full" type="Date" name="date_creation" :value="old('date_creation')" required autofocus />

                <x-input-error :messages="$errors->get('date_creation')" class="mt-2" />
            </div>

           
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-3">
                    {{ __('Enregistrer') }}
                </x-primary-button>
            </div>
			
        </form>

    </x-membres-card>
</x-app-layout>