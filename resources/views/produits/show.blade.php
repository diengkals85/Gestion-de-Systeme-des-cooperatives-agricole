<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('AFFICHER LE PRODUIT')
        </h2>
    </x-slot>

    <x-membres-card>
             <h3 class="font-semibold text-xl text-gray-800">@lang('Nom et Prenom Membre ')</h3>
			<p> {{ $produit->id_membre }}  {{ $produit->membre->Nom_membre }} {{ $produit->membre->Prenom_membre }}</p>
           <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Nom du Produit')</h3>
            <p>{{ $produit->Nom_produit }}</p>
			  <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Quantite Initiaile du Produit')</h3>
            <p>{{ $produit->quantite_initiale }}</p>
            <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Quantite Disponible du Produit')</h3>
            <p>{{ $produit->quantite }}</p>
			  <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Prix du Produit')</h3>
            <p>{{ $produit->prix }}</p>
       
    </x-membres-card>
</x-app-layout>