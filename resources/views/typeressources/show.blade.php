<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('Afficher  le type de Ressource')
        </h2>
    </x-slot>

    <x-membres-card>
        <h3 class="font-semibold text-xl text-gray-800">@lang('Type Ressource')</h3>
        <p>{{ $typeressource->type }}</p>
		
		
     
       
    </x-membres-card>
</x-app-layout>