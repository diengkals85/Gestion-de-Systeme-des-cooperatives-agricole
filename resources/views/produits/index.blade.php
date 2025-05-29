<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('LA LISTE DES PRODUITS')
        </h2>
    </x-slot>
    <div class="container flex justify-center mx-auto">
      <div class="flex flex-col">
          <div class="w-full">
              <div class="border-b border-gray-200 shadow pt-6">
                <table>
                  <thead class="bg-gray-50">
                    <tr>
                      <th class="px-2 py-2 text-xs text-gray-500">#</th>
                      <th class="px-2 py-2 text-xs text-gray-500">@lang('Nom Membre')</th>
					  <th class="px-2 py-2 text-xs text-gray-500">@lang('Libelle du Produit')</th>
            <th class="px-2 py-2 text-xs text-gray-500">@lang('Quantite Initiale du Produit')</th>
                      <th class="px-2 py-2 text-xs text-gray-500">@lang('Quantite Disponible du Produit')</th>
                      <th class="px-2 py-2 text-xs text-gray-500">@lang('Prix du Produit ')</th>
                    </tr>
                  </thead>
                  <tbody class="bg-white">
                    @foreach($produits as $produit)
                      <tr class="whitespace-nowrap">
					   <td class="px-4 py-4 text-sm text-gray-500"></td>
                        <td class="px-4 py-4 text-sm text-gray-500">{{$produit->membre->Nom_membre  }} {{$produit->membre->Prenom_membre  }}</td>
                        <td class="px-4 py-4">{{ $produit->Nom_produit }}</td>
                        <td class="px-4 py-4">{{ $produit->quantite_initiale }}</td>
                        <td class="px-4 py-4">{{ $produit->quantite }}</td>
                        <td class="px-4 py-4">{{ $produit->prix }}</td>
						 
                        <x-link-button href="{{ route('produits.show', $produit->id) }}">
                            @lang('Show')
                        </x-link-button>
                        <x-link-button href="{{ route('produits.edit', $produit->id) }}">
                            @lang('edit')
                        </x-link-button>
                    
						   <x-link-button class="delete-button" onclick="event.preventDefault(); if (confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')) {document.getElementById('destroy{{ $produit->id }}').submit();}">
                            @lang('Delete')
                        </x-link-button>
						
                        <form id="destroy{{ $produit->id }}" action="{{ route('produits.destroy', $produit->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
					<div>
				{{ $produits->links() }} <!-- Cela génère les liens de pagination -->
				</div>
              </div>
          </div>
      </div>
</x-app-layout>