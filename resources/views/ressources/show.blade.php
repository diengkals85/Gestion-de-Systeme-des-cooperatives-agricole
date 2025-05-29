<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('Show  Ressource')
        </h2>
    </x-slot>

    <x-membres-card>
        <h3 class="font-semibold text-xl text-gray-800">@lang('Nom de la  Cooperative ')</h3>
	  <p> {{ $ressource->id_cooperative }}  {{ $ressource->cooperative->nom_cooperative }}</p>
	   <h3 class="font-semibold text-xl text-gray-800">@lang('Type de Ressource ')</h3>
	  <p> {{ $ressource->id_type }}  {{ $ressource->typeressource->type }}</p>		
        <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Nom de la Ressource')</h3>
        <p>{{ $ressource->nom_ressource }}</p>
        <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Quantite de la Ressource')</h3>
        <p>{{ $ressource->Qte_ressource }}</p>
       
    </x-membres-card>
</x-app-layout>