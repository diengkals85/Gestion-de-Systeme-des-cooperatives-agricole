<x-app-layout>
    <x-slot name="header" class="slot1">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" >
            {{ __('Creer une nouvelle Culture') }}
        </h2>
    </x-slot>

    <x-membres-card>

        <!-- Message de réussite -->
        @if (session()->has('message'))
            <div class="mt-3 mb-4 list-disc list-inside text-sm text-green-600">
                {{ session('message') }}
            </div>
        @endif

        <form action="{{ route('cultures.store') }}" method="post">

            @csrf
		 
			

            <!--  Nom de la culture -->
            <div>
                <x-input-label for="nom_culture" :value="__('Nom de la Culture')" />

                <x-text-input  id="nom_culture" class="block mt-1 w-full" type="text" name="nom_culture" :value="old('nom_culture')" required autofocus />

                <x-input-error :messages="$errors->get('nom_culture')" class="mt-2" />
            </div>
			
			 <!--  Description de la Culture  -->
            <div>
                <x-input-label for="description" :value="__('Description de la Culture')" />
				  <x-textarea class="block mt-1 w-full" id="description" name="description">{{ old('description') }}</x-textarea>

                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>
			<div>
                <x-input-label for="rendement_estime" :value="__('Rendement Estime')" />

                <x-text-input  id="rendement_estime" class="block mt-1 w-full" type="number" name="rendement_estime" :value="old('rendement_estime')" required autofocus />

                <x-input-error :messages="$errors->get('rendement_estime')" class="mt-2" />
            </div>
			<div>
                <x-input-label for="rendement_reel" :value="__('Rendement Reel')" />

                <x-text-input  id="rendement_reel" class="block mt-1 w-full" type="number" name="rendement_reel" :value="old('rendement_reel')" required autofocus />

                <x-input-error :messages="$errors->get('rendement_reel')" class="mt-2" />
            </div>

			
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-3">
                    {{ __('ENREGISTRER') }}
                </x-primary-button>
            </div>
			
        </form>

    </x-membres-card>
</x-app-layout>