<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('Show  Ressource')
        </h2>
    </x-slot>

    <x-membres-card>
        <h3 class="font-semibold text-xl text-gray-800">@lang('Nom de la  Cooperative ')</h3>
	  <p> {{ $stock->id_cooperative }}  {{ $stock->cooperative->Nom_cooperatve }}</p>
	   <h3 class="font-semibold text-xl text-gray-800">@lang(' Ressource ')</h3>
	  <p> {{ $stock->id_ressource }}  {{ $stock->ressource->nom_ressource }}</p>		
        <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Quantite Initiale')</h3>
        <p>{{ $stock->quantite_initiale }}</p>
        <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Quantite Disponible')</h3>
        <p>{{ $stock->quantite_disponible }}</p>
          <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Quantite Seuil Alerte')</h3>
        <p>{{ $stock->seuil_alerte }}</p>
    </x-membres-card>
</x-app-layout>