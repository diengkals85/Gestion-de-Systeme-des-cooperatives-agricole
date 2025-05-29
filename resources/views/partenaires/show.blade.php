<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('Afficher un Partenaire')
        </h2>
    </x-slot>

    <x-membres-card>
        <h3 class="font-semibold text-xl text-gray-800">@lang('Nom Partenaire')</h3>
        <p>{{ $partenaire->nom_partenaire }}</p>
        <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Type de Partenaire')</h3>
        <p>{{ $partenaire->type_partenaire }}</p>
		
		  <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Contact de Partenaire')</h3>
        <p>{{ $partenaire->contact }}</p>
		
		 <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Email de Partenaire')</h3>
        <p>{{ $partenaire->email }}</p>
    
        <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Adresse de Partenaire')</h3>
        <p>{{ $partenaire->adresse }}</p>
       
    </x-membres-card>
</x-app-layout>