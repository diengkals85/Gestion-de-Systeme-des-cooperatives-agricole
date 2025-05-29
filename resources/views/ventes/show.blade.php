<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('Afficher la vente')
        </h2>
    </x-slot>

    <x-membres-card>
        <h3 class="font-semibold text-xl text-gray-800">@lang('Libelle du Produit ')</h3>
	  <p> {{ $vente->id_produit }}  {{ $vente->produit->Nom_produit }}</p>
	   <h3 class="font-semibold text-xl text-gray-800">@lang('Nom du Client ')</h3>
	  <p> {{ $vente->id_client }}  {{ $vente->client->nom_client }}</p>		
        <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Quantite')</h3>
        <p>{{ $vente->quantite }}</p>
		 <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Prix de Vente')</h3>
        <p>{{ $vente->prix_vente }}</p>
        <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Date de la vente ')</h3>
        <p>{{ $vente->date_vente }}</p>
		 <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Statut de la vente ')</h3>
        <p>{{ $vente->status }}</p>
       
    </x-membres-card>
</x-app-layout>