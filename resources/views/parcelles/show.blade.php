<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('Details du Parcelle')
        </h2>
    </x-slot>

    <x-membres-card>
        <h3 class="font-semibold text-xl text-gray-800">@lang('Nom du Parcelle')</h3>
		 <p>{{ $parcelle->nom_parcelle }}</p>
		  <h3 class="font-semibold text-xl text-gray-800">@lang('Superficie')</h3>
		 <p>{{ $parcelle->Superficie }}</p>
		   <h3 class="font-semibold text-xl text-gray-800">@lang('Type Sol')</h3>
		 <p>{{ $parcelle->type_sol }}</p>
		  <h3 class="font-semibold text-xl text-gray-800">@lang('PH du Sol')</h3>
		 <p>{{ $parcelle->ph_sol }}</p>
		 <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Nom du Projet')</h3>
		<p> {{ $parcelle->id_projet }}  {{ $parcelle->projet->Nom_projet }}</p>
		<h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Culture Actuelle')</h3>
		<p> {{ $parcelle->id_culture }}  {{ $parcelle->culture->Nom_Culture }}</p>
		<h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Rendement')</h3>
		<p> {{ $parcelle->id_culture }}  {{ $parcelle->parcelle->rendement }}</p>
	       
    </x-membres-card>
</x-app-layout>