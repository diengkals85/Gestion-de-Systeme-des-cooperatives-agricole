<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('Afficher Subvention')
        </h2>
    </x-slot>

    <x-membres-card>
        <h3 class="font-semibold text-xl text-gray-800">@lang('Nom de la  Cooperative ')</h3>
	  <p> {{ $subvention->id_cooperative }}  {{ $subvention->cooperative->nom_cooperative }}</p>
	   <h3 class="font-semibold text-xl text-gray-800">@lang('Partenaire ')</h3>
	  <p> {{ $subvention->id_partenaire}}  {{ $subvention->partenaire->nom_partenaire }}</p>		
        <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Date de Reception')</h3>
        <p>{{ $subvention->date_reception }}</p>
        <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Montant')</h3>
        <p>{{ $subvention->montant }}</p>
		  <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Description')</h3>
        <p>{{ $subvention->description }}</p>
       
    </x-membres-card>
</x-app-layout>