<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('Afficher le client')
        </h2>
    </x-slot>

    <x-membres-card>
        <h3 class="font-semibold text-xl text-gray-800">@lang('Nom')</h3>
        <p>{{ $client->nom_client }}</p>
        <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Prenom')</h3>
        <p>{{ $client->prenom_client }}</p>
		
		  <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Contact')</h3>
        <p>{{ $client->contact }}</p>
		
		 <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('email')</h3>
        <p>{{ $client->email }}</p>
    
        <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Adresse')</h3>
        <p>{{ $client->adresse }}</p>
       
    </x-membres-card>
</x-app-layout>