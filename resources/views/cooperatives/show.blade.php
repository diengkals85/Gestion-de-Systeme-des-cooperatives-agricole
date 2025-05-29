<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('Afficher Une Cooperative')
        </h2>
    </x-slot>

    <x-membres-card>
        <h3 class="font-semibold text-xl text-gray-800">@lang('Nom de la Cooperative')</h3>
        <p>{{ $cooperative->nom_cooperative }}</p>
		 <h3 class="font-semibold text-xl text-gray-800">@lang('Adresse de la  Cooperative')</h3>
        <p>{{ $cooperative->adresse }}</p>
		 <h3 class="font-semibold text-xl text-gray-800">@lang('Date de Creation de la Cooperative')</h3>
        <p>{{ $cooperative->date_creation }}</p>
     
       
    </x-membres-card>
</x-app-layout>