<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier Type de Ressource') }}
        </h2>
    </x-slot>

   
    <x-membres-card>
        <!-- Message de réussite -->
        @if (session()->has('message'))
            <div class="mt-3 mb-4 list-disc list-inside text-sm text-green-600">
                {{ session('message') }}
            </div>
        @endif

        <form action="{{ route('typeressources.update', $typeressource->id) }}" method="post">
            @csrf
            @method('put')

          
			  <!--  Nom  de la type  -->
            <div>
                <x-input-label for="type" :value="__('Type Ressource')" />

                <x-text-input id="type" class="block mt-1 w-full" type="text" name="type" :value="old('type', $typeressource->type)" required autofocus />
            
                <x-input-error :messages="$errors->get('type')" class="mt-2" />
            </div>
			
			
			
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-3">
                    {{ __('METTRE A JOUR') }}
                </x-primary-button>
            </div>
        </form>

    </x-membres-card>
</x-app-layout>