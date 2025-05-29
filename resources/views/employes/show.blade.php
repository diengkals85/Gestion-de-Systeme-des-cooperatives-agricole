<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('Afficher l EMploye')
        </h2>
    </x-slot>

    <x-membres-card>
        <h3 class="font-semibold text-xl text-gray-800">@lang('Nom de la  Cooperative ')</h3>
	  <p> {{ $employe->id_cooperative }}  {{ $employe->cooperative->Nom_cooperatve }}</p>
        <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Nom')</h3>
        <p>{{ $employe->nom }}</p>
		<h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Prenom')</h3>
        <p>{{ $employe->prenom }}</p>
		<h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Poste')</h3>
        <p>{{ $employe->poste }}</p>
		<h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Salaire')</h3>
        <p>{{ $employe->salaire }}</p>
        <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Date Embauche')</h3>
        <p>{{ $employe->date_embauche }}</p>
       
    </x-membres-card>
</x-app-layout>