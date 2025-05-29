<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('Show  Cotisation')
        </h2>
    </x-slot>

    <x-membres-card>
        <h3 class="font-semibold text-xl text-gray-800">@lang('Nom et Prenom Membre ')</h3>
			
		
			<p> {{ $cotisation->id_membre }}  {{ $cotisation->membre->Nom_membre }} {{ $cotisation->membre->Prenom_membre }}</p>
				
        <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Montant Cotisation')</h3>
        <p>{{ $cotisation->Montant }}</p>
		
    
        <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Date Cotisation')</h3>
        <p>{{ $cotisation->Date_cotisation }}</p>
       
    </x-membres-card>
</x-app-layout>