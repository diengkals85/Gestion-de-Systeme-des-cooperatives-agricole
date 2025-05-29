<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('Details du  Projet')
        </h2>
    </x-slot>

    <x-membres-card>
        <h3 class="font-semibold text-xl text-gray-800">@lang('Responsable du Projet')</h3>
			
		
			<p> {{ $projet->id_membre }}  {{ $projet->membre->Nom_membre }} {{ $projet->membre->Prenom_membre }}</p>
				
        <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Nom du Projet')</h3>
        <p>{{ $projet->Nom_projet }}</p>
		
		 <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Description ')</h3>
        <p>{{ $projet->Description }}</p>
		
		   <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Date Debut')</h3>
        <p>{{ $projet->Date_debut }}</p>
		
		   <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Date Fin')</h3>
        <p>{{ $projet->Date_fin }}</p>
		
		   <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Statut du Projet')</h3>
        <p>{{ $projet->Status_projet }}</p>
		
    
       
       
    </x-membres-card>
</x-app-layout>